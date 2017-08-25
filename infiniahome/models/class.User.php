<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-Aug-17
 * Time: 2:30 PM
 */

namespace InfiniaHome\User;

use InfiniaHome\DB\InfiniaUser;
use InfiniaHome\DB\InfiniaUserQuery;
use InfiniaHome\DB\Sessions;
use InfiniaHome\DB\SessionsQuery;
use InfiniaHome\DB\UserStatus;
use InfiniaHome\DB\UserStatusQuery;

use InfiniaHome\MiscFunctions\TemplateFromString;

use Propel\Runtime\Exception\PropelException;


use PHPMailer;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;


class User {


    protected $user_name;
    protected $user_id;
    protected $user_code;
    protected $user_email;
    protected $user_fullname;

    protected $hashed_pw;
    protected $orm_db;

    private $email_regex;
    private $url_regex;

    private $isLoggedIn;
    private $conf;

    /**
     * User constructor
     */
    public function __construct() {
        $this->orm_db = new InfiniaUser();
        $this->email_regex = <<<INF
/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?
[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-
\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]
+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(
?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(
?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?
::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]
:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4]
[0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD

INF;
        $this->url_regex = '/^(?:https?:\/\/)?(?:[^@\/\n]+@)?(?:www\.)?([^:\/\n]+)/';
        $this->isLoggedIn = false;

        try {
            $this->conf = Yaml::parse(file_get_contents("../conf/doh.yml"));
        } catch (ParseException $pe) {
            printf("DOHH! Something went wrong trying to parse the configuration file! 
            The error was: %s", $pe->getMessage());
        }
    }

    /**
     * @param $url string
     *
     */
    public function redirect($url) {
        header("Location: " . $url);
    }

    /**
     * Signup
     * @param $username string Username
     * @param $password string Password
     * @param $email string Email
     * @param $fullname string Full name
     * @param $code string HMAC SHA256 Hashed code of the parameters passed to this function
     * @param $rank string User rank.
     * @return boolean
     */
    public function register_user($username, $password, $email, $fullname, $code, $rank = "Normal") {
        if ($username == "" || $password == "" || $fullname == "" || $email =="") {
            exit("That field can't be left blank!");
        }

        if (!preg_match($this->email_regex, $email)) {
            exit("Email is invalid! Try again!");
        }

        try {
            if (InfiniaUserQuery::create()->filterByUserName($username)->findOne()) {
                exit("There is a user by that username. Try again with a different username.");

            } else if (InfiniaUserQuery::create()->filterByUserEmail($email)->findOne()) {
                exit("There is a user by that email. Try again with a different email.");
            }

            $this->hashed_pw = password_hash($password, PASSWORD_DEFAULT);
            $this->orm_db->setUserName($username);
            $this->orm_db->setUserEmail($email);
            $this->orm_db->setUserRealname($fullname);
            $this->orm_db->setUserPassword($this->hashed_pw);
            $this->orm_db->setUserCode($code);
            $this->orm_db->setUserRank($rank);

            $new_usr_status = new UserStatus();
            $new_usr_status->setStatus("Normal");

            $this->orm_db->setuserStatus($new_usr_status);

            $this->orm_db->save();

            $this->user_id = InfiniaUserQuery::create()->filterByUserName($username)->findOne()->getUserId();
            $this->user_name = $username;
            $this->user_email = $email;
            $this->user_fullname = $fullname;
            $this->user_code = $code;


            return True;


        } catch (PropelException $pe) {
            $this->redirect("/error.php?e=reg-error");
            return False;
        }
    }

    /**
     * @param $username_email string Username or email
     * @param $password string Unhashed password
     * @param $hashkey string Hash key for hashing (Secret key for each application)
     */
    public function login_user($username_email, $password, $hashkey, $origin) {
        try {
            $user = InfiniaUserQuery::create()
                ->filterByUserName($username_email)
                ->_or()
                ->filterByUserEmail($username_email)
                ->findOne();
            if ($user) {
                $upw = $user->getUserPassword();
                $uid = $user->getUserId();
                if (password_verify($password, $upw)) {
                    $uss = UserStatusQuery::create()->findOneByUserid($uid);
                    if ($uss->getStatus() == "Registered") {
                        $usr_sess = new Sessions();
                        $cmbn = $this->orm_db->getUserRealname().$this->orm_db->getUserName();
                        $hsh = hash_hmac("sha256", $cmbn, $hashkey);
                        $usr_sess->setSessionToken($hsh);
                        $this->orm_db->setuserSession($usr_sess);
                        $lel = Array();
                        preg_match($this->url_regex, $origin, $lel);
                        if ($lel[0] = "infinia.press") {
                            //TODO: REMOVE HARDCODING AND USE A CONFIG FILE FOR GOD'S SAKE
                            $this->redirect("https://infinia.press/infinia");
                            $this->isLoggedIn = true;
                        } else {
                            $getParams = Array(
                                'username' => $user->getUserName(),
                                'realName' => $user->getUserRealname(),
                                'email' => $user->getUserEmail(),
                                'signature' => $hsh
                            );
                            $this->redirect($lel[0]."?".http_build_query($getParams));
                        }
                    } else if ($uss->getStatus() == "Unregistered") {
                        exit("You have not verified your email. Please verify your email and try again! DOH!!!");
                    } else if ($uss->getStatus() == "Banned"){

                        if($uss->getBannedForever()) {
                            exit("You are banned from this service forever! 
                        Please take you and your trolly ways somewhere else.");
                        } else if (!$uss->getBannedForever()) {
                            exit("You are banned from this service for: " . $uss->getBannedtime() .
                               ". Behave yourself better and maybe you'll get unbanned sooner.
                            Unless your name is Mun Hin, that is.");
                        }

                    }
                } else {
                    exit("The password you entered is incorrect! DOH!!!");
                }
            }
        } catch (PropelException $pe) {

        }
    }



    public function logout() {
        $this->isLoggedIn = false;

        $usr = SessionsQuery::create()->findOneByUserid($this->user_id);
        $usr->delete();

        return true;
    }

    public function send_smtp_email($subject, $from, $msg, $altmsg) {
        $m = new PHPMailer();

        $m->isSMTP();
        $m->SMTPDebug = 'false';

        if (strcasecmp($this->conf["smtp"]["security"],"None")) {
            $m->SMTPAuth = false;
        } else if (strcasecmp($this->conf["smtp"]["security"], "TLS")
            || strcasecmp($this->conf["smtp"]["security"], "SSL")) {
            $m->SMTPAuth = true;
            $m->SMTPSecure = $this->conf["smtp"]["security"];
        } else {
            echo "Your email sending configuration is incorrect, please fix it.";
            exit(1);
        }

        $m->Host = $this->conf["smtp"]["server"];
        $m->Port = $this->conf["smtp"]["port"];
        $m->Username = $this->conf["smtp"]["username"];
        $m->Password = $this->conf["smtp"]["password"];

        $m->addAddress($this->user_email);

        $m->setFrom($from, "No Reply :: InfiniaPress Instance <".$this->conf["site"]["site_name"].">");
        $m->addReplyTo($from, "No Reply :: InfiniaPress Instance <".$this->conf["site"]["site_name"].">");

        $mainmsg = new TemplateFromString($msg);

        $mainmsg->set("user_name",$this->user_name);
        $mainmsg->set("user_id", $this->user_id);
        $mainmsg->set("user_code", $this->user_code);
        $mainmsg->set("user_fullname", $this->user_fullname);
        $mainmsg->set("user_email", $this->user_email);

        $altmsg = new TemplateFromString($altmsg);

        $altmsg->set("user_name", $this->user_name);
        $altmsg->set("user_id", $this->user_id);
        $altmsg->set("user_code", $this->user_code);
        $altmsg->set("user_fullname", $this->user_fullname);
        $altmsg->set("user_email", $this->user_email);

        $m->Subject = $subject;
        $m->Body = $mainmsg->output();
        $m->AltBody = $altmsg->output();

        $m->send();
    }

    /**
     * @return mixed
     */
    public function getUserCode()
    {
        return $this->user_code;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getUserFullname()
    {
        return $this->user_fullname;
    }

    /**
     * @return int
     */
    public function getUserId() {
        return $this->user_id;
    }

    public function isLoggedIn() {
        // SessionsQuery::create()->findOneByUserid($this->user_id)
        return $this->isLoggedIn;
    }



}
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
use InfiniaHome\DB\UserStatus;


use Propel\Runtime\Exception\PropelException;


use PHPMailer;



class User {


    protected $user_name;
    protected $user_id;
    protected $user_code;
    protected $user_email;
    protected $user_fullname;

    protected $hashed_pw;
    protected $orm_db;

    private $email_regex;


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
    public function login_user($username_email, $password, $hashkey) {
        try {
            $user = InfiniaUserQuery::create()
                ->filterByUserName($username_email)
                ->_or()
                ->filterByUserEmail($username_email)
                ->findOne();
            if ($user == null) {

            }
        } catch (PropelException $pe) {

        }
    }

    /**
     * @return int
     */
    public function getUserId() {
        return $this->user_id;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-Aug-17
 * Time: 2:30 PM
 */

namespace InfiniaHome\User;

use InfiniaHome\DB\InfiniaUser;
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

    /**
     * User constructor
     */
    public function __construct() {
        $this->orm_db = new InfiniaUser();

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
     */
    public function register_user($username, $password, $email, $fullname, $code, $rank = "Normal") {
        if ($username == "" || $password == "" || $fullname == "" || $email =="") {
            exit("That field can't be left blank!");
        }


        try {
            $this->hashed_pw = password_hash($password, PASSWORD_DEFAULT);
            $this->orm_db->setUserName($username);
            $this->orm_db->setUserEmail($email);
            $this->orm_db->setUserRealname($fullname);
            $this->orm_db->setUserPassword($this->hashed_pw);
            $this->orm_db->setUserCode($code);
            $this->orm_db->setUserRank($rank);


        } catch (PropelException $pe) {
            $this->redirect("/error.php?e=reg-error");
        }
    }


}
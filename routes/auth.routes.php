<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 27-Aug-17
 * Time: 11:51 AM
 */


require ROOT . "/../vendor/autoload.php";

use InfiniaHome\User\User;

use InfiniaHome\DB\InfiniaUserQuery;
use InfiniaHome\DB\UserStatus;
use InfiniaHome\DB\ConfigurationQuery;
use InfiniaHome\DB\InfiniaLinkedAppQuery;

$route->get("sso/login", function() {
    global $twig;
    global $webroot_config;
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
        header("Location: " . $_GET["origin"]);
    } else {
        return $twig->render("login.html.twig", $webroot_config);

    }

});

$route->get("sso/signup", function (){
    global $twig;
    global $webroot_config;
    return $twig->render("signUp.html.twig", $webroot_config);

});

$route->post("sso/login", function() {
    if (isset($_POST, $_POST["username"], $_POST["password"], $_POST["origin"], $_POST["app_public_key"])) {
        $u = new User();
        if ($u->login_user($_POST["username"], $_POST["password"])) {
            $iDislikeThis = array(
                "username" => $u->getUserName(),
                "realName" => $u->getUserFullname(),
                "email" => $u->getUserEmail(),
                "signature" => hash_hmac("sha256",
                    $u->getUserName().$u->getUserFullname().$u->getUserEmail(),
                    InfiniaLinkedAppQuery::create()->findOneByappPublicKey($_POST["app_public_key"])->getappPrivateKey())
            );
            $u->redirect($_POST["origin"]."?".http_build_query($iDislikeThis));
        } else {
            echo "Could not log in! DOH!";
        }
    } else {
        echo "Some details given to the login system are invalid. Please check and try again. If you believe this to be
        an application error, please contact the developers at support@infinia.press.";
    }
});

$route->post("sso/signup", function() {
    if (isset($_POST, $_POST["username"], $_POST["password"], $_POST["email"], $_POST["fullname"])) {
        $u = new User();
        global $twig;

        if ($u->register_user($_POST["username"], $_POST["password"], $_POST["email"], $_POST["fullname"],
            hash_hmac("sha256", uniqid(rand()), random_bytes(69)))) {
            $u->send_smtp_email("Verify email :: InfiniaPress @ ".
                ConfigurationQuery::create()->findOneByKey("infinia_domain")->getValue()
                , ConfigurationQuery::create()->findOneByKey("from_email")->getValue(),
                $twig->render("email_templates/verify_email.html.twig", array(
                    "user_name" => $u->getUserName(),
                    "user_realname" => $u->getUserFullname(),
                    "user_email" => $u->getUserEmail(),
                    "user_code" => $u->getUserCode(),
                    "infinia_domain" => ConfigurationQuery::create()->findOneByKey("infinia_domain")->getValue()
                )), $twig->render("email_templates/verify_email.alt.twig", array (
                    "user_name" => $u->getUserName(),
                    "user_realname" => $u->getUserFullname(),
                    "user_email" => $u->getUserEmail(),
                    "user_code" => $u->getUserCode(),
                    "infinia_domain" => ConfigurationQuery::create()->findOneByKey("infinia_domain")->getValue()
                )));
        } else {
            echo "This is a very helpful and descriptive error message: An unknown error occured.";
        }
    }
});

$route->get("sso/verify", function () {
   if (isset($_GET, $_GET["code"])) {
       $usr = InfiniaUserQuery::create()->findOneByUserCode($_GET["code"]);

       $usts = new UserStatus();
       $usts->setStatus("Registered");

       $usr->setuserStatus($usts);
       $usr->save();
   }

});


<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 27-Aug-17
 * Time: 11:51 AM
 */


require "../../vendor/autoload.php";

use InfiniaHome\User\User;
use InfiniaHome\DB\ConfigurationQuery;
use InfiniaHome\DB\InfiniaLinkedAppQuery;

$route->get("sso/login", function() {
    global $twig;
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
        header("Location: " . $_GET["origin"]);
    } else {
        $twig->render("login.html.twig", array(
            'webroot' => ConfigurationQuery::create()->findOneByKey("infinia_webroot")
        ));

    }

});

$route->get("sso/signup", function (){
    global $twig;
    $twig->render("signUp.html.twig", array(
        'webroot' => ConfigurationQuery::create()->findOneByKey("infinia_webroot")
    ));

});

$route->post("sso/login", function() {
    if (isset($_POST, $_POST["username"], $_POST["password"], $_POST["origin"], $_POST["app_public_key"])) {
        $u = new User();
        if ($u->login_user($_POST["username"], $_POST["password"],
            ConfigurationQuery::create()->findOneByKey("pw_hashkey"))) {
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

        if ($u->register_user($_POST["username"], $_POST["password"], $_POST["email"], $_POST["fullname"], hash_hmac("sha256", uniqid(rand()), random_bytes(69)))) {
            //TODO: REMOVE HARDCODING FOR FKS SAKE
            $u->send_smtp_email("Verify email :: InfiniaPress @ ".
                ConfigurationQuery::create()->findOneByKey("infinia_domain")
                , ConfigurationQuery::create()->findOneByKey("from_email"), "Message", "Altmessage");
        } else {
            echo "This is a very helpful and descriptive error message: An unknown error occured.";
        }
    }
});

//TODO: sso/confirm
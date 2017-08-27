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
    if (isset($_POST, $_POST["username"], $_POST["password"], $_POST["origin"])) {
        $u = new User();
        if ($u->login_user($_POST["username"], $_POST["password"], ConfigurationQuery::create()->findOneByKey("pw_hashkey"), $_POST["origin"])) {
            $u->redirect($_POST["origin"]);
        } else {
            echo "Could not log in! DOH!";
        }
    } else {
        echo "Some details given to the login system are invalid. Please check and try again";
    }
});

$route->post("sso/signup", function() {
   if (isset($_POST, $_POST["username"], $_POST["password"], $_POST["email"])) {

   }
});
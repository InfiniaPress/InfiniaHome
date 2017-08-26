<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 12:53 PM
 */

namespace InfiniaHome\Route;

require "../../vendor/autoload.php";

use InfiniaHome\User\User;
use Phroute\Phroute\RouteCollector;
use InfiniaHome\DB\ConfigurationQuery;

use Twig_Loader_Filesystem;
use Twig_Environment;

$route = new RouteCollector();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    'cache' => '../twig_cache'
));

session_start();

// MAIN ROUTES
$indexroute = Array(
    "",
    "index",
    "index.inf",
    "index.pp",
    "index.hm",
    "index.php",
    "index.html.twig",
);


foreach ($indexroute as $loute) {
    $route->any($loute, function() {
        global $twig;

        $twig->render("index.html.twig", array(
           'webroot' => ConfigurationQuery::create()->findOneByKey("infinia_webroot")
        ));
    });
}



// AUTH ROUTES
//TODO: Move these to seperate files

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


//TODO: Admin routes

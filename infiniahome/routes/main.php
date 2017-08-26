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

$route = new RouteCollector();

session_start();

// MAIN ROUTES
$indexroute = Array(
    "",
    "index",
    "index.inf",
    "index.pp",
    "index.hm",
    "index.php",
    "index.html",
);


foreach ($indexroute as $loute) {
    $route->any($loute, function() {
        readfile("../views/index.html");
    });
}



// AUTH ROUTES
//TODO: Move these to seperate files

$route->get("sso/login", function() {
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
        header("Location: " . $_GET["origin"]);
    } else {
        readfile("../views/login.html");
    }

});

$route->get("sso/signup", function (){
    readfile("../views/signUp.html");
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

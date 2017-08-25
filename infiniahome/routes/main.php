<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 12:53 PM
 */

namespace InfiniaHome\Route;

require "../../vendor/autoload.php";

use Phroute\Phroute\RouteCollector;
use InfiniaHome\User\User;


$route = new RouteCollector();
$GLOBALS["usr"] = new User();
session_start();

$route->group(["prefix" => "main"], function(RouteCollector $route){
    $indexroute = Array(
        "/",
        "/index",
        "/index.inf",
        "/index.pp",
        "/index.hm",
        "/index.php",
        "/index.html",
    );


    foreach ($indexroute as $loute) {
        $route->any($loute, function() {
            readfile("../views/index.html");
        });
    }



});


$route->group(["prefix" => "auth"], function (RouteCollector $route){

    $route->get("/sso/login", function() {
        if ($_SESSION["isLoggedIn"]) {
        } else {
            readfile("../views/login.html");
        }

    });

    $route->get("/sso/signup", function (){
        readfile("../views/signUp.html");
    });

    $route->post("/sso/login", function() {
        if (isset($_POST, $_POST["username"], $_POST["password"])) {
            if ($GLOBALS["usr"]->login_user($_POST["username"], $_POST["password"])) {

            }
        }
    });
});
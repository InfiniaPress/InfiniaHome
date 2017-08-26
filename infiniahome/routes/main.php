<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 12:53 PM
 */

namespace InfiniaHome\Route;

use Phroute\Phroute\RouteCollector;


$route = new RouteCollector();


$route->group(["prefix" => "main"], function($route){
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
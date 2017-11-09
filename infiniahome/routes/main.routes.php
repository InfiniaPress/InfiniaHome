<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 12:53 PM
 */

namespace InfiniaHome\Route;


require ROOT."/../vendor/autoload.php";


use Phroute\Phroute\RouteCollector;
use InfiniaHome\DB\ConfigurationQuery;


use Twig_Loader_Filesystem;
use Twig_Environment;

$route = new RouteCollector();
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    'cache' => '../twig_cache'
));

$webroot_config = Array (
    'webroot' => ConfigurationQuery::create()->findOneByKey("infinia_webroot")->getValue()
);

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
        global $twig;
        global $webroot_config;

        $twig->render("index.html.twig", $webroot_config);
    });
}

// Put all the other routes here.

require "setup.routes.php";
require "admin.routes.php";
require "auth.routes.php";

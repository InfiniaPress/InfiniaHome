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

// Put all the other routes here.

require "setup.routes.php";
require "admin.routes.php";
require "auth.routes.php";

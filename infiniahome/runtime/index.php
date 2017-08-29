<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 1:38 PM
 */
require "../../vendor/autoload.php";

require_once "../routes/main.routes.php";

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;




$httpMtd = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];


$dispatcher = new Dispatcher($route->getData());

try {
    $response = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    echo $response;
} catch (HttpRouteNotFoundException $httpRouteNotFoundException) {
    echo "There seems to be an error in this InfiniaPress installation. Kindly contact the administrators of this site.";
}







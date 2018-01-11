<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 26/8/17
 * Time: 1:38 PM
 */
require "../vendor/autoload.php";
require "root.php";

require_once "routes/main.routes.php";
require_once "generated-conf/config.php";

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

$dispatcher = new Dispatcher($route->getData());

try {
    $response = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], parse_url($_SERVER["QUERY_STRING"], PHP_URL_PATH));
    echo $response;
} catch (HttpRouteNotFoundException $hRNfE) {
    echo "This is a very helpful error message: An unknown error occured\n";
    echo "Contact the developers at support.infinia.press";
}
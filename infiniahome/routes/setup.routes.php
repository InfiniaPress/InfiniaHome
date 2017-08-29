<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 27-Aug-17
 * Time: 6:02 PM
 */

require "../../vendor/autoload.php";

use InfiniaHome\DB\Configuration;
use InfiniaHome\DB\ConfigurationQuery;

$doh = Array (
    "",
    "index",
    "index.inf",
    "index.pp",
    "index.hm",
    "index.php",
    "index.html",
);
foreach ($doh as $r) {
    $route->get("/setup/".$r, function () {
        global $twig;
        global $webroot_config;

        $twig->render("setup/index.html.twig", $webroot_config);
    });
}

$route->any("/setup-2/", function () {
    global $twig;
    global $webroot_config;

    $twig->render("setup/setup_2.html.twig", $webroot_config);
});

$route->any("/setup-3/", function () {
    global $twig;
    global $webroot_config;

    $twig->render("setup/setup_3.html.twig", $webroot_config);

});
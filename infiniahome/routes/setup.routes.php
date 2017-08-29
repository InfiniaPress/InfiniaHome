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


foreach ($indexroute as $r) {
    $route->get("/setup/$r", function () {
        global $twig;
        global $webroot_config;

        $twig->render("setup/index.html.twig", $webroot_config);
    });
}

for ($i = 0; $i <= 4; $i++) {
    $route->any("/setup-$i/", function () {
        global $twig;
        global $webroot_config;
        global $i;

        $twig->render("setup/setup_$i.html.twig", $webroot_config);
    });
}

<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 27-Aug-17
 * Time: 11:53 AM
 */


require '../../vendor/autoload.php';

use InfiniaHome\DB\ConfigurationQuery;

//TODO: Admin routes


foreach ($indexroute as $dh) {
    $route->any("/admin/$dh", function () {
        global $twig;
        global $webroot_config;

        $twig->render("admin/index.html.twig", $webroot_config);
    });

}


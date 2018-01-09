<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 27-Aug-17
 * Time: 11:53 AM
 */


require ROOT.'/../vendor/autoload.php';

use InfiniaHome\DB\ConfigurationQuery;

//TODO: Admin routes


foreach ($indexroute as $dh) {
    $route->any("/admin/$dh", function () {
        global $twig;
        global $webroot_config;

        return $twig->render("admin/index.html.twig", $webroot_config);
    });

}


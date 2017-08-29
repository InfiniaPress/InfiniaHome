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
use Propel\Runtime\Exception\PropelException;


foreach ($indexroute as $r) {
    $route->get("/setup/$r", function () {
        global $twig;
        global $webroot_config;

        $twig->render("setup/index.html.twig", $webroot_config);
    });
}

for ($i = 0; $i <= 4; $i++) {
    $route->get("/setup/setup-$i", function () {
        global $twig;
        global $webroot_config;
        global $i;

        $twig->render("setup/setup_$i.html.twig", $webroot_config);
    });
}


$route->post("/setup/setup-1", function () {
    if (isset($_POST, $_POST["dbtype"], $_POST["host"], $_POST["port"],
        $_POST["name"], $_POST["username"], $_POST["password"])) {
        try {
            if ($_POST["dbtype"] == "pgsql") {
                $pdo = new PDO($_POST["dbtype"].
                    ":host=".$_POST["host"].
                    ";port=".$_POST["port"].
                    ";dbname=".$_POST["name"].
                    ";user=".$_POST["username"].
                    ";password=".$_POST["password"]
                );

            } else if ($_POST["dbtype" == "mysql"]) {
                $pdo = new PDO($_POST["dbtype"].
                    ":host=".$_POST["host"].
                    ";port=".$_POST["port"].
                    ";dbname=".$_POST["name"], $_POST["username"], $_POST["password"]);
            } else {
                http_response_code(500);
            }

            http_response_code(200);
            echo "true";
        } catch (PDOException $PDOException) {
            http_response_code(500);
            echo "Failed to connect to the database";
        }
    } else {
        http_response_code(500);
        echo "What kind of DOH is this, nothing was entered?";
    }

});

$route->post("/setup/setup-2", function () {
    if(isset($_POST, $_POST["domain"], $_POST["directory"])) {

        try {
            $c = new Configuration();
            $c->setKey("infinia_webroot");
            $c->setValue($_POST["directory"]);
            $c->save();

            $c2 = new Configuration();
            $c2->setKey("infinia_domain");
            $c2->setValue($_POST["domain"]);
            $c->save();
            http_response_code(200);
            echo "true";
        } catch (PropelException $pe) {
            http_response_code(500);
            echo "There is an error trying to connect to the database. Fix your configuration and try again";
        }


    } else {
        http_response_code(500);
        echo "What kind of DOH is this, nothing was entered??";
    }
});


$route->post("/setup/setup-3", function () {
    if (isset($_POST, $_POST["name"], $_POST["url"], $_POST["type"])) {

        if (!($ppkp = openssl_pkey_new(array(
            "private_key_bits" => 128
        )))) {
            http_response_code(500);
            echo "What kind of DOH is this, nothing was entered???";

        } else {
            $pubKey = openssl_pkey_get_public($ppkp);
            $pvtKey = openssl_pkey_get_private($ppkp);

            http_response_code(200);
            echo json_encode(array("public_key" => $pubKey, "private_key" => $pvtKey));
        }

    } else {
        http_response_code(500);
        echo "What kind of DOH is this, nothing was entered???";

    }
});

$route->post("/setup/setup-4", function () {
    if (isset($_POST)) {

    }
});

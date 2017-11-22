<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 22/11/17
 * Time: 4:24 PM
 */

require "../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);


$dbparams = array(
    'driver' => 'pdo_mysql',
    'user' => 'infinia',
    'password' => 'infinia',
    'dbname' => 'infiniahome'
);

$entityManager = EntityManager::create($dbparams, $config);


<?php
// database.php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$paths = ['/app/Models'];
$isDevMode = true;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname'   => $_ENV['DB_DATABASE'],
];

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);
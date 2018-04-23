<?php

use CapsuleManager\Wrapper\Manager;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

include '../vendor/autoload.php';
include '../.env.php';

$dsn = "sqlite:host=" . DBHOST;
$pdo = new \PDO($dsn, DBUSER, DBPASS);

$capsule = new Manager($pdo);
$conn = $capsule->getConnection();
print get_class($conn);
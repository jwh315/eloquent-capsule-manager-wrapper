<?php

use CapsuleManager\Wrapper\Manager;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

include '../vendor/autoload.php';
include '../.env.php';

$dsn = 'sqlite::memory:';
$pdo = new \PDO($dsn, null, null);

$capsule = new Manager($pdo);
$conn = $capsule->getConnection();
print get_class($conn);
<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",

    "host" => getenv('DB_HOST'),

    "database" => getenv('DB_DATABASE'),

    "username" => getenv('DB_USERNAME'),

    "password" => getenv('DB_PASSWORD')

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

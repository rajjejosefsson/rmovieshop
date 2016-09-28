<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

// Tell it how to connect to the db
$capsule->addConnection([
    'driver' => getenv('DB_DRIVER'),
    'host' => getenv('DB_HOST'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);


// Boot the Eloquent Illuminate
$capsule->setAsGlobal();
$capsule->bootEloquent();
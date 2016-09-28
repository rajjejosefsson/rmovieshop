<?php

// Set up the autoload that handles the vendor files
require(__DIR__ . "/../vendor/autoload.php");
include 'ChromePhp.php';

ChromePhp::log('Hello console from start!');

// Set up Session on start
session_start();



// Set up whoops plugin (error handler)
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
// echo "TEST";


$router = new AltoRouter();





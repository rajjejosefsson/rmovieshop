<?php

// Used for using clouseres in routes file
$controller = null;
$method = null;

/*
  Load our starter with all dependencies
*/
include(__DIR__ . "/../bootstrap/start.php");

// call class Dotenv (static class) to all my files with one stage back with (up) /../
$dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
$dotenv->load();


// Load db
include(__DIR__ . "/../bootstrap/db.php");

// All the routes
include(__DIR__ . "/../routes.php");


$isMatch = $router->match();


// check If Controller@Method (string)   else clousre (object)

if (is_string($isMatch['target'])) {

// e.g isMatch['target'] = PageController@getShowHomePage
// We explode the controller@method add it into a key value list
    list($controller, $method) = explode("@", $isMatch['target']);
}


// check if the controller isn't null else it might be a clousre
if (($controller != null) && (is_callable(array($controller, $method)))) {
    $object = new $controller;
    call_user_func(array($object, $method), array($isMatch['params']));

    // see if we call a controller
} else if($isMatch && is_callable($isMatch['target'])){
    // Is Clousere
    call_user_func($isMatch['target'], $isMatch['params']);
} else {
    echo "Cannot find $controller -> $method";
    exit();
}






// call Dotenv (static class) used in root


// E.g $router->map(GET, "/," PageController@getS howHomePage, "home")
//include(__DIR__ . "/../routes.php");





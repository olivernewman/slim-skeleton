<?php

//require __DIR__ . '/../vendor/autoload.php';
//session_start();
//// Instantiate the app
//$settings = require __DIR__ . '/../config/settings.php';
//$app = new \Slim\App($settings);
//// Set up dependencies
//require __DIR__ . '/../config/dependencies.php';
//// Register middleware
//require __DIR__ . '/../config/middleware.php';
//// Register routes
//require __DIR__ . '/../config/routes.php';
//
//// Error OverRides
//require __DIR__ . '/../config/errors.php';
//// Run app
//$app->run();


session_start();
// Instantiate the app
$app = require __DIR__ . '/../src/bootstrap.php';
// Run app
$app->run();
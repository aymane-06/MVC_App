<?php

require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use Public\Router;

// Define routes
$routes = [
    "/"         => "../App/Controllers/index.php",
    "/showCars" => "../App/Controllers/showCars.php",
    "/Admin"    => "../App/Controllers/admin.php"
];

// Initialize Router
$router = new Router($routes);
$router->handleRequest();

<?php

namespace public;

class Router {
    private array $routes = [];

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function handleRequest() {
        // Get the request URI and clean it
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        if (array_key_exists($uri, $this->routes)) {
            require $this->routes[$uri];
        } else {
            $this->abort(404);
        }
    }

    private function abort(int $status = 404) {
        http_response_code($status);
        require "../App/views/{$status}.php";
        exit();
    }
}

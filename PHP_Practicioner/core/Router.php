<?php

namespace App\Core;


class Router{

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controllers){
        $this->routes['GET'][$uri] = $controllers;
    }

    public function post($uri, $controllers){
        $this->routes['POST'][$uri] = $controllers;
    }

    public function define($routes){
        $this->routes = $routes;
    }

    public function direct($uri, $requestType){
        
        if(array_key_exists($uri, $this->routes[$requestType])){

            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );

        }

        throw new Exception("No route defined for this URI.");

    }

    protected function callAction($controller, $action){

        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller();

        if(! method_exists($controller, $action)){

            throw new Exception(
                "{$controller} does not respond to the {$action} "
            );

        }

        return (new $controller)->$action();

    }

    public static function load($file){

        $router = new static;

        require $file;

        return $router;

    }

}
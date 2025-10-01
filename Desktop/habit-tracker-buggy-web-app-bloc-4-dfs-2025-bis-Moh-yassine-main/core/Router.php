<?php

namespace Mns\Buggy\Core;

final class Router 
{
    public $uri;

    public $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;

        // Match url
        $uri = $_SERVER['REQUEST_URI'];
        $this->uri = parse_url($uri, PHP_URL_PATH);
    }

    public function match($uri)
    {
        // Find route
        $route = null;
        foreach ($this->routes as $r) {
            if ($r['path'] === $uri) {
                $route = $r;
                break;
            }
        }
        return $route;
    }
}
<?php

namespace Mns\Buggy\Core;

use App\Controller\ErrorController;

final class Kernel
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle()
    {
        $route = $this->router->match($this->router->uri);
        if ($route) {
            $controller = new $route['controller']();
            $action = $route['action'];

            if(!empty($route['guard'])){
                $guard = $route['guard'];
                $guard::check();
            }

            $_SESSION['current_uri'] = $route['path'];
            $controller->$action();
        } else {
            http_response_code(404);
            //echo "404 Not Found";
            $controller = new ErrorController();
            $controller->notFound();
            exit;
        }
    }

    public function run()
    {
        $this->handle();
    }

}


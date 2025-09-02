<?php
class Router
{
    protected static array $routes = [];

    public static function get($route, $controller, $action): void
    {
        self::$routes['get'][strtolower($route)] = [$controller, $action];
    }

    public function resolve($requestUri, $requestMethod): void
    {
        $path = parse_url($requestUri, component: PHP_URL_PATH);
        $method = strtolower($requestMethod);

        if (isset(self::$routes[$method][$path])) {
            [$controller, $action] = self::$routes[$method][$path];
            $this->callAction($controller, $action);
            return;
        }

        echo "404 - Page not found!";
    }

    private function callAction($controller, $action): void
    {
        $controllerClass = "app/controllers/{$controller}";

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
                return;
            }
        }

        echo "404 - Controller or action not found!";
    }
}

?>
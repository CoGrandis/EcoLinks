<?php

class Router
{
    private static array $routes = [];

    public static function get(string $route, string $controller, string $action): void
    {
        self::$routes['get'][strtolower($route)] = [$controller, $action];
    }

    public static function post(string $route, string $controller, string $action): void
    {
        self::$routes['post'][strtolower($route)] = [$controller, $action];
    }

    public static function resolve(string $requestUri, string $requestMethod): void
    {
        $path = parse_url($requestUri, PHP_URL_PATH);
        $method = strtolower($requestMethod);

        if (isset(self::$routes[$method][$path])) {
            [$controller, $action] = self::$routes[$method][$path];
            self::callAction($controller, $action);
            return;
        }

        self::notFound();
    }

    private static function callAction(string $controller, string $action): void
    {
        $controllerClass = "App\\Controllers\\{$controller}";

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
                return;
            }
        }

        self::notFound();
    }

    private static function notFound(): void
    {
        http_response_code(404);
        echo "404 - Page not found!";
    }
}
?>
<?php
/**
 * Clase Router
 */
class Router{
    protected $routes = [];
    
    public function get($uri, $action) {
        $uri = str_replace('/', '\/', $uri);
        $pattern = '/^' . preg_replace('/\{[^\/]+\}/', '([^\/]+)', $uri) . '$/';

        $this->routes['GET'][$pattern] = $action;
    }
    public function resolve() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes[$method] as $pattern => $action) {
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                if (is_array($action) && count($action) === 2) {
                    $controllerName = $action[0];
                    $methodName = $action[1];
                    $controllerFile = __DIR__."/../app/controllers/{$controllerName}.php";

                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        $controllerInstance = new $controllerName();
                        if (method_exists($controllerInstance, $methodName)) {
                            call_user_func_array([$controllerInstance, $methodName], $matches);
                            return;
                        }
                    }
                }
        }
     }
    http_response_code(404);
    echo "404 - Página no encontrada";
    }
}

?>
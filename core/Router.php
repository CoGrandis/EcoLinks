<?php
class Router {
    protected $routes = [];

    // Registrar rutas GET
    public function get($uri, $action) {
        return $this->addRoute('GET', $uri, $action);
    }

    // Registrar rutas POST
    public function post($uri, $action) {
        return $this->addRoute('POST', $uri, $action);
    }

    // Método interno para agregar ruta
    private function addRoute($method, $uri, $action) {
        $uri = str_replace('/', '\/', $uri);
        $pattern = '/^' . preg_replace('/\{[^\/]+\}/', '([^\/]+)', $uri) . '$/';

        $this->routes[$method][$pattern] = [
            'action' => $action,
            'roles'  => []
        ];

        // Retornar objeto para encadenar ->only()
        return $this;
    }

    // Permisos por rol
    public function only($roles) {
        $method = $_SERVER['REQUEST_METHOD'];
        end($this->routes[$method]);
        $lastKey = key($this->routes[$method]);
        $this->routes[$method][$lastKey]['roles'] = (array) $roles;
        return $this;
    }

    // Resolver la ruta
    public function resolve() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method])) {
            http_response_code(404);
            echo "404 - Método no permitido";
            return;
        }

        foreach ($this->routes[$method] as $pattern => $route) {
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                // 🔐 Validación de roles
                if (!empty($route['roles'])) {
                    if (!isset($_SESSION['user'])) {
                        header("Location: /");
                        exit;
                    }

                    $userRole = $_SESSION['user']['FK_ID_ROL'] ?? null;
                    if (!in_array($userRole, $route['roles'])) {
                        header("Location: /");
                        exit;
                    }
                }

                // Llamada al controlador
                if (is_array($route['action']) && count($route['action']) === 2) {
                    $controllerName = $route['action'][0];
                    $methodName = $route['action'][1];
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

        // Si no matcheó ninguna ruta
        http_response_code(404);
        echo "404 - Página no encontrada";
    }
}

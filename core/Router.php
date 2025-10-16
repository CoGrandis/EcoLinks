<?php
require_once __DIR__ . '/../app/controllers/ErrorController.php';

class Router {
    protected $routes = [];
    protected $lastAddedRoute = null;
    protected $publicRoutes = ['/login', '/register', '/'];

    // Registrar ruta GET
    public function get($uri, $action) {
        return $this->addRoute('GET', $uri, $action);
    }

    // Registrar ruta POST
    public function post($uri, $action) {
        return $this->addRoute('POST', $uri, $action);
    }

    // Método interno para agregar ruta
    private function addRoute($method, $uri, $action) {
        $pattern = '/^' . str_replace('/', '\/', preg_replace('/\{[^\/]+\}/', '([^\/]+)', $uri)) . '$/';
        $this->routes[$method][$pattern] = [
            'action' => $action,
            'roles'  => []
        ];
        $this->lastAddedRoute = [$method, $pattern];
        return $this;
    }

    // Definir roles permitidos para la última ruta agregada
    public function only($roles) {
        if ($this->lastAddedRoute) {
            [$method, $pattern] = $this->lastAddedRoute;
            $this->routes[$method][$pattern]['roles'] = (array) $roles;
        }
        return $this;
    }

    // Resolver la ruta actual
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
                array_shift($matches); // quitar el full match

                // Verificar rutas públicas
                if (in_array($uri, $this->publicRoutes, true)) {
                    $route['roles'] = [];
                }

                // Verificar roles
                if (!empty($route['roles'])) {
                    if (!isset($_SESSION['user'])) {
                        header("Location: /login");
                        exit;
                    }
                    $userRole = $_SESSION['user']['FK_ID_ROL'] ?? null;
                    if (!in_array($userRole, $route['roles'], true)) {
                        header("Location: /"); // home u otra página de error
                        exit;
                    }
                }

                // Llamada al controlador
                if (is_array($route['action']) && count($route['action']) === 2) {
                    [$controllerName, $methodName] = $route['action'];
                    $controllerFile = __DIR__ . "/../app/controllers/{$controllerName}.php";

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
        $errorController = new ErrorController();
        $errorController->error404();
    }
}
?>

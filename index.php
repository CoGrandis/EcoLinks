<?php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = trim($request, '/');

$segments = explode('/', $request);

$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
$methodName = $segments[1] ?? 'index';

$controllerFile = __DIR__ . "/app/controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        http_response_code(404);
        echo "404 - Método no encontrado";
    }
} else {
    http_response_code(404);
    echo "404 - Controlador no encontrado";
}

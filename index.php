<?php
include '.env.php';
include 'core/Router.php';
include 'app/librarys/TemplateMotor/TemplateMotor.php';
session_start();

$router =  new Router();    
$router->get('/', ['HomeController', 'index']);


/* AUTH ROUTES */
    $router->post('/login', ['AuthController', 'login']);
    $router->get('/login', ['AuthController', 'login']);
    $router->get('/logout', ['AuthController', 'logout']);
    $router->get('/register', ['AuthController', 'register']);
    $router->post('/register', ['AuthController', 'register']);


    $router->get('/perfil', ['EmployeeController','profile'])->only([1 , 2, 3]);


/* ADMIN ROUTES */
    $router->get('/dashboard', ['AdminController','dashboard'])->only([1]);
    $router->get('/noticias', ['PostController', 'muro'])->only([1,2,3]);
    $router->post('/noticias', ['PostController', 'muro'])->only([1]);
    $router->get('/documentos', ['AdminController', 'files'])->only([1,2,3]);
    $router->get('/empleados/registrar', ['EmployeeController', 'register'])->only([1]);
    $router->post('/empleados/registrar', ['EmployeeController', 'register'])->only([1]);
    $router->get('/empleados/perfil', ['EmployeeController', 'profile'])->only([1]);

    $router->get('/empleados', ['EmployeeController', 'list'])->only([1]);
    $router->post('/empleados', ['EmployeeController', 'list'])->only([1]);
    $router->get('/reclamo', ['ReclamoController', 'createReclamo']);

/* EMPLOYEE ROUTES */
    $router->resolve();

?>
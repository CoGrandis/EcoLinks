<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '.env.php';
include 'core/Router.php';
include 'app/librarys/TemplateMotor/TemplateMotor.php';
session_start();

$router =  new Router();    
$router->get('/', ['HomeController', 'index']);


/* AUTH ROUTES */
    $router->post('/auth/login', ['AuthController', 'login']);
    $router->get('/auth/login', ['AuthController', 'login']);
    $router->get('/auth/logout', ['AuthController', 'logout']);
    $router->get('/auth/register', ['AuthController', 'register']);
    $router->post('/auth/register', ['AuthController', 'register']);
/* ADMIN ROUTES */
    $router->get('/admin/dashboard', ['AdminController','dashboard'])->only([1]);
    $router->get('/admin/profile/{id}', ['EmployeeController','profile'])->only([1]);
    $router->get('/admin/news', ['PostController', 'muro'])->only([1]);
    $router->post('/admin/news', ['PostController', 'muro'])->only([1]);
    $router->get('/admin/files', ['AdminController', 'files'])->only([1]);
    $router->get('/admin/employee/register', ['EmployeeController', 'register'])->only([1]);
    $router->post('/admin/employee/register', ['EmployeeController', 'register'])->only([1]);
    $router->get('/admin/employee/profile/{id}', ['EmployeeController', 'profile'])->only([1]);
    $router->get('/admin/employee/delete/{id}', ['EmployeeController', 'delete'])->only([1]);
    
    $router->get('/admin/employee', ['EmployeeController', 'list'])->only([1]);
    $router->post('/admin/employee', ['EmployeeController', 'list'])->only([1]);

/* EMPLOYEE ROUTES */
    $router->get('/profile/{id}', ['EmployeeController','profile'])->only([3]);
    $router->get('/news', ['PostController', 'muro'])->only([3]);
    $router->get('/files', ['EmployeeController', 'files'])->only([3]);
    $router->resolve();

?>
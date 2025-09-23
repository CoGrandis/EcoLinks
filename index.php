<?php
include '.env.php';
include 'core/Router.php';
include 'app/librarys/TemplateMotor/TemplateMotor.php';
$router =  new Router();    
$router->get('/', ['HomeController', 'index']);
session_start();


/* AUTH ROUTES */
$router->post('/auth/login', ['AuthController', 'login']);
$router->post('/auth/register', ['AuthController', 'register']);
$router->get('/auth/login', ['AuthController', 'login']);
$router->get('/auth/logout', ['AuthController', 'logout']);
$router->get('/auth/register', ['AuthController', 'register']);
/* ADMIN ROUTES */
$router->get('/admin/dashboard', ['AdminController', 'dashboard']);
$router->middleware('/admin/dashboard', 'AuthMiddleware');
$router->get('/admin/news', ['AdminController', 'news']);
/* AUTH MIDDLEWARE */

$router->resolve();
?>
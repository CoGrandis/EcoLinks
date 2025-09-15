<?php
include '.env.php';
include 'core/Router.php';
include 'app/libraries/TemplateMotor/TemplateMotor.php';
$router =  new Router();
$router->get('/', ['HomeController', 'index']);
/* AUTH ROUTES */
$router->get('/auth/login', ['AuthController', 'login']);
$router->get('/auth/logout', ['AuthController', 'logout']);
$router->get('/auth/register', ['AuthController', 'register']);
/* ADMIN ROUTES */
$router->get('/admin/dashboard', ['AdminController', 'dashboard']);
$router->get('/admin/news', ['AdminController', 'news']);

$router->resolve();
?>
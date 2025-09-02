<?php
require_once __DIR__ .'/core/Router.php';

$router =  new Router();
$router->get('/', ['HomeController', 'index']);
$router->get('/Auth/registerView', ['AuthController', 'registerView']);
$router->get('/Auth/loginView', ['AuthController', 'loginView']);
$router->resolve();
?>
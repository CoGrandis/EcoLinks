<?php
require_once __DIR__ .'/core/Router.php';

$route =  new Router();

$route->get('/','HomeController.php', 'index' );

$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);   
?>
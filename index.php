<?php
require_once 'core/Router.php';

$route =  new Router();

$route->get('/','HomeController', 'index' );

$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);   
?>
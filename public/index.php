<?php
    $request = $_SERVER['REQUEST_URI'];
    $viewDir = '/views/';

    switch ($request) {
        case '':
        case '/':
            require __DIR__ . $viewDir . 'home.php';
            break;

        case '/login':
            require __DIR__ . $viewDir . 'login.html';
            break;

        case '/register':
            require __DIR__ . $viewDir . 'register.html';
            break;
    }


?>
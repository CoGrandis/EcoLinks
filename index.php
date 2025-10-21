<?php
include '.env.php';
include 'core/Router.php';
include 'app/librarys/TemplateMotor/TemplateMotor.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$router =  new Router();    
$router->get('/', ['HomeController', 'index']);


/* RUTAS AUTH */
    $router->post('/login', ['AuthController', 'login']);
    $router->get('/login', ['AuthController', 'login']);
    $router->get('/logout', ['AuthController', 'logout']);
    $router->get('/register', ['AuthController', 'register']);
    $router->post('/register', ['AuthController', 'register']);


    $router->get('/perfil', ['EmployeeController','profile'])->only([1 , 2, 3]);


    $router->get('/dashboard', ['AdminController','dashboard'])->only([1]);
    $router->get('/calendario', ['CalendarioController','calendario'])->only([1]);
    $router->get('/noticias', ['PostController', 'muro'])->only([1,2,3]);
    $router->post('/noticias', ['PostController', 'muro'])->only([1]);

    $router->get('/documentos', ['DocumentosController', 'misDocumentos'])->only([1,2,3]);
    $router->post('/documentos/subir', ['DocumentosController', 'subirDocumentos'])->only([1,2,3]);
    $router->post('/documentos/eliminar', ['DocumentosController', 'eliminarDocumento'])->only([1,2,3]);

    $router->get('/empleados/registrar', ['EmployeeController', 'register'])->only([1]);
    $router->post('/empleados/registrar', ['EmployeeController', 'register'])->only([1]);
    $router->get('/empleados/perfil', ['EmployeeController', 'profile'])->only([1]);
    $router->get('/empleados', ['EmployeeController', 'list'])->only([1]);
    $router->post('/empleados', ['EmployeeController', 'list'])->only([1]);

    // RUTAS RECLAMOS
    $router->get('/mis-reclamos', ['ReclamoController', 'misReclamos']);

    $router->get('/reclamos', ['ReclamoController', 'buscar']);
    $router->post('/reclamos', ['ReclamoController', 'buscar']);
    $router->post('/reclamo/actualizar', ['ReclamoController', 'actualizarTabla']);
    $router->get('/reclamo', ['ReclamoController', 'createReclamo']);
    $router->post('/reclamo', ['ReclamoController', 'createReclamo']);
    $router->post('/reclamo/estado', ['ReclamoController', 'responderReclamo']);
    $router->get('/reclamo/detalle/{id}', ['ReclamoController', 'detalleReclamo']);
    $router->get('/reclamo/pdf/{id}', ['ReclamoController', 'generarPDF']);


    $router->get('/recibo-sueldo', ['ReciboSueldoController', 'crearRecibo']);
    $router->post('/recibo-sueldo', ['ReciboSueldoController', 'crearRecibo']);

    $router->resolve();

?>
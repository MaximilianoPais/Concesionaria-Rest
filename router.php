<?php
require_once './config.php';
require_once './App/Controllers/motosApiController.php';
// Librerías necesarias para el router

require_once './Libs/request.php';
require_once './Libs/response.php';
require_once './Libs/router.php';

$router = new Router();

/*
|--------------------------------------------------------------------------
| RUTAS DE LA API                                                          
|--------------------------------------------------------------------------
| GET /motos              -> listar todas (paginadas)
| GET /motos/:id          -> obtener una moto específica
| POST /motos             -> crear una moto nueva
| PUT /motos/:id          -> actualizar una moto
| DELETE /motos/:id       -> eliminar una moto
|--------------------------------------------------------------------------
*/

$router->addRoute('motos',      'GET',    'MotosApiController', 'getPaginado');
$router->addRoute('motos/:id',  'GET',    'MotosApiController', 'get');
$router->addRoute('motos',      'POST',   'MotosApiController', 'create');
$router->addRoute('motos/:id',  'PUT',    'MotosApiController', 'update');
$router->addRoute('motos/:id',  'DELETE', 'MotosApiController', 'delete');

// más adelante autenticación
// require_once './App/Controllers/usersApiController.php';
// $router->addRoute('user/token', 'GET', 'UserApiController', 'getToken');

// Ruta por defecto -> listar motos
$router->setDefaultRoute('MotosApiController', 'getPaginado');

// Ejecutar router solo si hay un recurso
$resource = $_GET['resource'] ?? null;
$router->route($resource, $_SERVER['REQUEST_METHOD']);





<?php

use Core\Router;

$router = new Router(URL_BASE);

$router::get("/", ["Pages", 'HomeController', 'index']);

// Rotas para eventos
$router::get("/eventos", ["Pages", 'EventoController', 'index']);
$router::get('/eventos/criar', ['Pages', 'EventoController', 'create']);
$router::get('/evento/{id}', ['Pages', 'EventoController', 'getEvent']);
$router::get('/eventos/{id}/editar', ['Pages', 'EventoController', 'edit']);
$router::get("/sucesso", ["Pages", 'EventoController', 'sucesso']);
$router::post('/eventos', ['Pages', 'EventoController', 'store']);
$router::post('/eventos/{id}/atualizar', ['Pages', 'EventoController', 'update']);
$router::post('/eventos/deletar', ['Pages', 'EventoController', 'delete']);

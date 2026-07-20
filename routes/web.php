<?php

use Core\Router;
use Core\Http\Response;

$router = new Router(URL_BASE);

$router->get("/", [
    function () {
        return new Response("Hello, World!", 200);
    },
]);

$router->get("/home", [
    function () {
        return new Response(\App\Controller\Pages\Home::index(), 200);
    },
]);

<?php

use Core\Router;

$router = new Router(URL_BASE);

$router::get("/", ["Pages", 'HomeController', 'index']);

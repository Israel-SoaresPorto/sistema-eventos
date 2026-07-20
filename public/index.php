<?php

require '../vendor/autoload.php';
require '../config/constants.php';
require '../routes/web.php';

$response = $router->dispatch();
$response->sendResponse();

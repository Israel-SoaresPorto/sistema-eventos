<?php

require __DIR__ . '/vendor/autoload.php';

$home = new \App\Controller\Pages\Home();

echo $home->index();
<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('grades', 'DefaultController');
Router::get('plan', 'DefaultController');
Router::post('login', 'SecurityController');

Router::run($path);
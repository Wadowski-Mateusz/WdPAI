<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');

Routing::get('grades', 'DefaultController');
Routing::get('attendance', 'DefaultController');
Routing::get('remarks', 'DefaultController');
Routing::get('messages', 'DefaultController');
Routing::get('plan', 'DefaultController');
Routing::get('user', 'DefaultController');

Routing::post('login', 'SecurityController');

Routing::post('addUser', 'UserController');

//Routing::get('panel_admin', 'AdminController'); // każda rola z osobnym kontrolerem?
//Routing::get('panel_director', 'DirectorController'); // ?
//Routing::get('panel_teacher', "TeacherController"); //?

Routing::run($path);
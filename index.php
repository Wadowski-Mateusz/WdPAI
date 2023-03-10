<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('plan', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::get('deleteCookies', 'SecurityController');

Routing::get('user', 'UserController');
Routing::post('addUser', 'UserController');

Routing::post("addSchool", 'SchoolController');
Routing::post("deleteSchool", 'SchoolController');
Routing::get("getSchool", 'SchoolController');
Routing::get("getSchoolsWithoutDirector", 'SchoolController');

Routing::get('panelClasses', 'ClassController');
Routing::post("addClass", 'ClassController');
Routing::post("studentsFromClass", 'ClassController');
Routing::post("searchClass", 'ClassController');

Routing::post("addSubject", 'SubjectController');

Routing::get('grades', 'GradeController');
Routing::post("addGrade", 'GradeController');


//Routing::get('panel_admin', 'AdminController'); // każda rola z osobnym kontrolerem?
//Routing::get('panel_director', 'DirectorController'); // ?
//Routing::get('panel_teacher', "TeacherController"); //?

Routing::run($path);
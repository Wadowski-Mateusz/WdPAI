<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/UserController.php';
require_once 'src/controllers/SchoolController.php';
require_once 'src/controllers/ClassController.php';
require_once 'src/controllers/SubjectController.php';
require_once 'src/controllers/GradeController.php';

class Routing {

  public static $routes;

  public static function get($url, $view) {
    self::$routes[$url] = $view;
  }

  public static function post($url, $view) {
    self::$routes[$url] = $view;
  }

  public static function run ($url) {
      if (sizeof(explode("/", $url)) == 2 && array_key_exists(explode("/", $url)[1], self::$routes)){
          $action = explode("/", $url)[1];
          $urlParts = explode("/", $url)[1];
      }
      else {
          $urlParts = explode("/", $url);
          $action = $urlParts[0];
      }

      if (!array_key_exists($action, self::$routes))
      die("Wrong url!");

    $controller = self::$routes[$action];
    $object = new $controller;
    $action = $action ?: 'index';

    $id = $urlParts[1] ?? '';

    $object->$action(intval($id));
  }

}
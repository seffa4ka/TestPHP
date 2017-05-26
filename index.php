<?php
ini_set('display_errors','On');
require_once __DIR__ . '/Core/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$pathParts = explode('/', $path);

if ($pathParts[1] === 'main' && empty($pathParts[2])) {
  header("Location: .",TRUE,301);
  exit();
}

if (!empty($pathParts[2]) && $pathParts[2] === 'index') {
  header("Location: /$pathParts[1]/",TRUE,301);
  exit();
}

$requestedController = !empty($pathParts[1]) ? $pathParts[1] : 'main';
$requestedAction = !empty($pathParts[2]) ? $pathParts[2] : 'index';

if (ctype_lower($requestedController) && ctype_lower($requestedAction)) {
  $requestedController = ucfirst($requestedController);
  $requestedAction = ucfirst($requestedAction);

  $controllerClass = 'App\\Controller\\' . $requestedController . 'Controller';
  if (class_exists($controllerClass)){
    $controller = new $controllerClass;
    $method = 'action' . $requestedAction;
    if (method_exists($controller, $method)) {
      $controller->$method();
    } else {
      header("HTTP/1.0 404 Not Found");
    }
  } else {
    header("HTTP/1.0 404 Not Found");
  }
} else {
  header("HTTP/1.0 404 Not Found");
}

<?php
ini_set('display_errors','On');
require_once __DIR__ . '/Common/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$mainController = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'First';
$mainAction = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';
if ($mainAction === '') {
  $mainAction = 'All';
}

$controllerClassName = 'App\\Controllers\\' . $mainController . 'Controller';

if (class_exists($controllerClassName)){
  $controller = new $controllerClassName;
  $method = 'action' . $mainAction;
  if (method_exists($controller, $method)) {
    $controller->$method();
  }
}

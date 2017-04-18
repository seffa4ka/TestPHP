<?php
ini_set('display_errors','On');
require_once __DIR__ . '/common/autoload.php';

$mainController = isset($_GET['mainController']) ? $_GET['mainController'] : 'First';
$mainAction = isset($_GET['mainAction']) ? $_GET['mainAction'] : 'All';

$controllerClassName = $mainController . 'Controller';
$controller = new $controllerClassName;
$method = 'action' . $mainAction;
$controller->$method();

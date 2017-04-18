<?php
require_once __DIR__ . '/models/First.php';
ini_set('display_errors','On');

$items = First::getAll();
/*
echo '<pre>'; 
var_dump($items);
echo '</pre>';
*/
include __DIR__ . '/views/index.php';

?>

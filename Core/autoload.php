<?php

spl_autoload_register(function ($class) {
  $classParts = explode('\\', $class);
  $classParts[0] = $_SERVER['DOCUMENT_ROOT'];
  $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
  if (file_exists($path)) {
    require $path;
  }
});

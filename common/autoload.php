<?php

spl_autoload_register(function ($class) {
  if (file_exists(__DIR__ . '/' . $class . '.php')){
    require __DIR__ .'/' . $class . '.php';
  } elseif (file_exists(__DIR__ . '/../controllers/' . $class . '.php')) {
    require __DIR__ . '/../controllers/' . $class . '.php';
  } elseif (file_exists(__DIR__ . '/../models/' . $class . '.php')) {
    require __DIR__ . '/../models/' . $class . '.php';
  }
});

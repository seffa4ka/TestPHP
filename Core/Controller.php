<?php

namespace App\Core;

use App\Core\View;

abstract class Controller {

  public function actionIndex() {
    $view = new View();
    $view->display('default/index.php');
  }
}

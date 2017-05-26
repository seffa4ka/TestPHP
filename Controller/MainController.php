<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Main;
use App\Core\View;

class MainController extends Controller{

  public function actionDb() {
    $view = new View();
    $view->items = Main::findAll();
    $view->display('mian/index.php');
  }
}

<?php

class FirstController {

  public function actionAll() {
    $items = First::getAll();
    $view = new View();
    $view->items = $items;
    $view->display('first/all.php');
  }

  public function actionOne() {
    $id = $_GET['id'];
    $item = First::getOne($id);
    $view = new View();
    $view->item = $item;
    $view->display('first/one.php');
  }
}

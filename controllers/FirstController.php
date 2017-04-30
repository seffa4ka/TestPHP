<?php

class FirstController {

  public function actionAll() {
    $items = FirstModel::findAll();
    $view = new View();
    $view->items = $items;
    $view->display('first/all.php');
  }

  public function actionOne() {
    $id = $_GET['id'];
    $item = FirstModel::findOne($id);
    $view = new View();
    $view->item = $item;
    $view->display('first/one.php');
  }

  public function actionInsert() {

    $ar = new FirstModel();
    $ar->title = 'Test Insert';
    $ar->text = 'Test text.';
    $ar->date = date("Y-m-d H:i:s");
    $ar->insert();
  }
}

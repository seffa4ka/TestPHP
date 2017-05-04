<?php

class FirstController {

  public function actionAll() {
    $items = FirstModel::findAll();
    $view = new View();
    $view->items = $items;
    $view->display('first/all.php');
  }

  public function actionOne() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $item = FirstModel::findOne($id);
    $view = new View();
    $view->item = $item;
    $view->display('first/one.php');
  }

  public function actionFindOne() {
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $value = isset($_GET['value']) ? $_GET['value'] : '';
    $item = FirstModel::findOneByName($name, $value);
    $view = new View();
    $view->item = $item;
    $view->display('first/findOne.php');
  }
  
  public function actionInsert() {

    $model = new FirstModel();
    $model->title = 'Test Insert';
    $model->text = 'Test text.';
    $model->date = date("Y-m-d H:i:s");
    $model->save();
  }
  
  public function actionUpdate() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $model = FirstModel::findOne($id);
    if ($model) {
      $model->title = 'Test Update';
      $model->text = 'Test text.';
      $model->date = date("Y-m-d H:i:s");
      $model->save();
    }
  }

  public function actionDelete() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $model = FirstModel::findOne($id);
    if ($model) {
      $model->delete($id);
    }
  }
}

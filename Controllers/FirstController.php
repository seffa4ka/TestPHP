<?php

namespace App\Controllers;

use App\Models\First;
use App\Common\View;

class FirstController {

  public function actionAll() {
    $items = First::findAll();
    $view = new View();
    $view->items = $items;
    $view->display('first/all.php');
  }

  public function actionOne() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $item = First::findOne($id);
    $view = new View();
    $view->item = $item;
    $view->display('first/one.php');
  }

  public function actionFindOne() {
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $value = isset($_GET['value']) ? $_GET['value'] : '';
    $item = First::findOneByName($name, $value);
    $view = new View();
    $view->item = $item;
    $view->display('first/findOne.php');
  }
  
  public function actionInsert() {

    $model = new First();
    $model->title = 'Test Insert';
    $model->text = 'Test text.';
    $model->date = date("Y-m-d H:i:s");
    $model->save();
  }
  
  public function actionUpdate() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $model = First::findOne($id);
    if ($model) {
      $model->title = 'Test Update';
      $model->text = 'Test text.';
      $model->date = date("Y-m-d H:i:s");
      $model->save();
    }
  }

  public function actionDelete() {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $model = First::findOne($id);
    if ($model) {
      $model->delete($id);
    }
  }
}

<?php

require_once __DIR__ . '/../common/DB.php';

class First {

  public $id;
  public $title;
  public $text;
  public $date;

  public static function getAll() {
    $db = new DB;
    return $db->query('SELECT * FROM `first`', 'First');
  }

}

?>
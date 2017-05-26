<?php

namespace App\Core;

use App\Core\DB;

abstract class Model {

  static protected $table;

  public static function findAll() {
    $db = new DB();
    $sql = 'SELECT * FROM ' . static::$table;
    return $db->query($sql, get_called_class());
  }
}

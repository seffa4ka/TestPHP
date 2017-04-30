<?php

abstract class MainModel {

  static protected $table;
  
  protected $data = [];

  public function __set($name, $value) {
    $this->data[$name] = $value;
  }
  
  public function __get($name) {
    return $this->data[$name];
  }

  public static function findAll() {
    $className = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table;
    $db = new DB();
    $db->setClassName($className);
    return $db->query($sql);
  }
  
  public static function findOne($id) {
    $className = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    $db->setClassName($className);
    return $db->query($sql, [':id' => $id])[0];
  }
  
  public function insert() {
    $cols = array_keys($this->data);
    $data = [];
    foreach ($cols as $col) {
      $data[':' . $col] = $this->data[$col];
    }
    $sql = 'INSERT INTO ' . static::$table . ' '
            . '(' . implode(', ', $cols) . ')'
            . ' VALUES '
            . '(' . implode(', ', array_keys($data)) . ')';
    $db = new DB();
    $db->execute($sql, $data);
  }
}

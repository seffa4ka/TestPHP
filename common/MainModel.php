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

  public function __isset($name) {
    return isset($this->data[$name]);
  }

  public static function findAll() {
    $db = new DB();
    $db->setClassName(get_called_class());
    $sql = 'SELECT * FROM ' . static::$table;
    return $db->query($sql);
  }

  public static function findOne($id) {
    $db = new DB();
    $db->setClassName(get_called_class());
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    $res = $db->query($sql, [':id' => $id]);
    if (!empty($res)) {
      return $res[0];
    }
    return FALSE;
  }

  public static function findOneByName($name, $value) {
    $db = new DB();
    $db->setClassName(get_called_class());
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $name . '=:value';
    $res = $db->query($sql, [':value' => $value]);
    if (!empty($res)) {
      return $res[0];
    }
    return FALSE;
  }

  protected function insert() {
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
    $this->id = $db->lastInsertId();
  }

  protected function update() {
    $cols = [];
    $data = [];
    foreach ($this->data as $name => $value) {
      $data[':' . $name] = $value;
      if ('id' === $name) {
        continue;
      }
      $cols[] = $name . '=:' . $name;
    }
    $sql = 'UPDATE ' . static::$table . ' '
            . 'SET ' . implode(', ', $cols) . ' '
            . 'WHERE id=:id';
    $db = new DB();
    $db->execute($sql, $data);
  }
  
  public function save() {
    if (!isset($this->id)) {
      $this->insert();
    } else {
      $this->update();
    }
  }

  public function delete($id) {
    $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    $db->execute($sql, [':id' => $id]);
  }
}

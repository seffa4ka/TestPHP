<?php

class DB {

  private $mysqli;

  public function __construct() {
    $config = parse_ini_file('config/conf.ini');
    $this->mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['base']);
    if (mysqli_connect_errno()) {
    printf("Could not connect: %s\n", mysqli_connect_error());
      exit();
    }
  }

  public function query($sql, $class = 'stdClass') {
    if ($result = $this->mysqli->query($sql)) {
      $resultArray = [];
      while ($obj = $result->fetch_object($class)) {
        $resultArray[] = $obj;
      }
      $result->close();
    }
    $this->mysqli->close();
    return $resultArray;
  }

}

?>

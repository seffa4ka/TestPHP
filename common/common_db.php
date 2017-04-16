<?php
function db_connect() {
  $config = parse_ini_file('config/conf.ini');
  $mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['base']);
  if ($mysqli->connect_errno){
    echo "Could not connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  return $mysqli;
}
?>
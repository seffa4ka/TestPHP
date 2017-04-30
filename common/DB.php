<?php

class DB {

  private $dbh;
  private $className = 'stdClass';


  public function __construct() {

   function database_connect ($hostname, $database, $username, $password){
        $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        return $dbh;
    }

    try {
        $config = parse_ini_file('config/conf.ini');
        $this->dbh = database_connect ($config['host'], $config['base'], $config['user'], $config['password']);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
  
  public function setClassName($className) {
    $this->className = $className;
  }

  public function query($sql, $params = []) {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
  }
  
  public function execute($sql, $params = []) {
    $sth = $this->dbh->prepare($sql);
    return $sth->execute($params);
  }
}

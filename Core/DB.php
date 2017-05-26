<?php

namespace App\Core;

use \PDO;

class DB {

  private $dbh;

  public function __construct() {
    try {
        $config = parse_ini_file('config/main.ini');
        $this->dbh = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['base'],
                $config['user'],
                $config['password']
              );
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }

  public function query($sql, $class, $params = []) {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_CLASS, $class);
  }
}

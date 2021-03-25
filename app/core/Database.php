<?php

namespace app\core;

use PDO;
use PDOException;

class Database
{
  private $db;

  public function __construct($dbType, $dbHost, $dbName, $dbUser, $dbPass)
  {
    //init db connection
    try {
      $this->db = new PDO("$dbType:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    } catch (PDOException $ex) {
      die($ex->getMessage());
    }
  }

  public function prepareStmt($query, $data = [])
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
    return $stmt;
  }

  public function querySingle($query, $data)
  {
    $stmt = $this->prepareStmt($query, $data);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function queryAll($query)
  {
    $stmt = $this->prepareStmt($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

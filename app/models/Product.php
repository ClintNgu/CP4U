<?php
use app\core\Database;

class Product {
  private $db;

  public function __construct() {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function getProducts() {

  }

  public function getProduct($item_id) {

  }
  
  public function updateProduct($data) {

  }

  public function deleteProduct($item_id) {

  }
}
<?php

use app\core\Database;

class Product
{
  private $db;

  public function __construct()
  {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function addToCart($data)
  {
    $query =  "INSERT INTO cart(expiration_date, quantity, item_id, user_id) 
    VALUES(:expiration_date, :quantity, :item_id, :user_id);";
    return $this->db->prepareStmt($query, $data);
  }

  public function deleteFromCart($cart_id)
  {
    $query = 'DELETE FROM cart WHERE cart_id=?';
    return $this->db->prepareStmt($query, [$cart_id])->rowCount();
  }
}

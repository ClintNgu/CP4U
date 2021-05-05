<?php

use app\core\Database;

class Order
{
  private $db;

  public function __construct()
  {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function addOrder($data)
  {
    $query =  "INSERT INTO orders(quantity, order_date, user_id, item_id) 
                 VALUES(:quantity, :order_date, :user_id, :item_id);";
    return $this->db->prepareStmt($query, $data);
  }

  public function getOrders($userId)
  {
    $query =  "SELECT * FROM orders WHERE `user_id`=$userId";
    return $this->db->queryAll($query);
  }

  public function getOrderDates($userId)
  {
    $query =  "SELECT DISTINCT order_date FROM orders WHERE `user_id`=$userId";
    return $this->db->queryAll($query);
  }
}

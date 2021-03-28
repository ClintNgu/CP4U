<?php

use app\core\Database;

class Product
{
  private $db;

  public function __construct()
  {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function getProducts()
  {
    $query = 'SELECT * FROM products 
                ORDER BY item_name';
    return $this->db->queryAll($query);
  }

  public function getProductsByName($item)
  {
    $query = "SELECT * FROM products 
                WHERE item_name='$item'";
    return $this->db->queryAll($query);
  }

  public function getProductsByCategory($cat)
  {
    $query = "SELECT * FROM products 
                WHERE category='$cat';
                ORDER BY item_name;";
    return $this->db->queryAll($query);
  }

  public function getProduct($item_id)
  {
    $query = 'SELECT * FROM products WHERE item_id=?';
    return $this->db->querySingle($query, [$item_id]);
  }

  public function updateProduct($data)
  {
    $query =  "UPDATE products 
                SET item_name=:item_name, image=:image, description=:description, price=:price, 
                  quantity=:quantity, supplier_name=:supplier_name, category=:category
                WHERE item_id=:id;";
    return $this->db->prepareStmt($query, $data)->rowCount();
  }

  public function deleteProduct($item_id)
  {
    $query = 'DELETE FROM products WHERE item_id=?';
    return $this->db->prepareStmt($query, [$item_id])->rowCount();
  }

  public function insertProduct($data)
  {
    $query =  "INSERT INTO products(item_name, image, description, price, quantity, supplier_name, category) 
                VALUES(:item_name, :image, :description, :price, :quantity, :supplier_name, :category);";
    return $this->db->prepareStmt($query, $data);
  }
}

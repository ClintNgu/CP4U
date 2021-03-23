<?php 
namespace app\controllers;

use app\core\Controller;

class Product extends Controller {
  private $model;

  public function __construct() {
    //init model
    $this->model = $this->loadModel('Product'); 
  }

  public function getProducts() {
    return $this->model->getProducts();
  }
  
  public function getProduct($item_id) {
    return $this->model->getProduct($item_id);
  }
  
  public function updateProduct($data) {
    return $this->model->getProduct($data);
  }
  
  public function deleteProduct($item_id) {
    return $this->model->getProduct($item_id);
  }
  
  public function insertProduct($data) {
    return $this->model->getProduct($data);
  }

}
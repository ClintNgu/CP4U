<?php

namespace app\controllers;

use app\core\Controller;

class Product extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = $this->loadModel('Product');
  }

  public function getProducts()
  {
    return $this->model->getProducts();
  }

  public function getProductsByCategory($cat)
  {
    return $this->model->getProductsByCategory($cat);
  }

  public function getProductsBySupplierName($supp)
  {
    return $this->model->getProductsBySupplierName($supp);
  }

  public function getProductById($item_id)
  {
    return $this->model->getProduct($item_id);
  }

  public function updateProduct($data)
  {
    return $this->model->getProduct($data);
  }

  public function deleteProduct($item_id)
  {
    return $this->model->getProduct($item_id);
  }

  public function insertProduct($data)
  {
    return $this->model->getProduct($data);
  }
}

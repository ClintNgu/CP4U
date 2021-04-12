<?php

namespace app\controllers;

use app\core\Controller;

class Product extends Controller
{
  private static $model;
  private $urlCategories = [
    'cpu' => 'CPUs',
    'graphics card' => 'GPUs',
    'motherboard' => 'Motherboards',
    'ram' => 'Rams',
    'm.2' => 'M2s',
    'power supply' => 'Power_Supplies',
    'cpu cooler' => 'CPU_Coolers',
    'pc case' => 'PC_Cases',
  ];

  public function __construct()
  {
    self::$model = $this->loadModel('Product');
  }

  private function addUrlCategory($products)
  {
    foreach ($products as $idx => ['category' => $cat]) {
      $products[$idx]['urlCategory'] = $this->urlCategories[strtolower($cat)];
    }
    return $products;
  }

  public function isValidCategory($postCat)
  {
    return array_search($postCat, array_map('strtolower', $this->urlCategories));
  }

  public function getProducts()
  {
    $products = self::$model->getProducts();
    return $this->addUrlCategory($products);
  }

  public function getProductById($item_id)
  {
    $product = [self::$model->getProductById($item_id)];
    return $this->addUrlCategory($product)[0];
  }

  public function updateProduct($data)
  {
    return self::$model->updateProduct($data);
  }

  public function deleteProduct($item_id)
  {
    return self::$model->deleteProduct($item_id);
  }

  public function insertProduct($data)
  {
    return self::$model->insertProduct($data);
  }
}

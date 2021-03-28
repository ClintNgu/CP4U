<?php

use app\core\Controller;
use app\controllers\Product;

class Admin extends Controller
{
  private $data = ['title' => 'Admin'];
  private $productCtrl;
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
    $this->productCtrl = new Product;

    //query all products
    $this->data['products'] = $this->getProducts();
  }

  public function index($params)
  {
    // render product
    if (isset($params[1])) {
      $this->renderProduct($params[1]);
      exit;
    }

    //render view
    $this->renderView('Admin', $this->data);
  }

  private function getProducts()
  {
    $products =  $this->productCtrl->getProducts();
    $products = $this->addUrlCategory($products);
    return $products;
  }

  private function addUrlCategory($products)
  {
    foreach ($products as $idx => ['category' => $cat]) {
      $products[$idx]['urlCategory'] = $this->setUrlCategory($cat);
    }
    return $products;
  }

  private function setUrlCategory($cat)
  {
    return $this->urlCategories[strtolower($cat)];
  }

  private function renderProduct($id)
  {
    //get item
    $this->data['product'] = $this->getProductById($id);
    $this->data['title'] = $this->data['product']['item_name'];
    unset($this->data['products']);

    //no item found
    if (empty($this->data['title'])) {
      header('Location: ' . URL_ROOT . '/admin');
      exit;
    }

    $this->renderView('AdminProduct', $this->data);
  }
  private function getProductById($id)
  {
    $products = [$this->productCtrl->getProductById($id)];
    $products = $this->addUrlCategory($products);

    return $products[0];
  }
}

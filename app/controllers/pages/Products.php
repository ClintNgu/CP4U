<?php

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller
{
  private $data = ['title' => 'Products'];
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
    //TODO: filter items

    //query all products
    $this->data['products'] = $this->getProducts();     
    
    //get all unique suppliers
    $this->data['sidebar']['suppliers'] = array_unique(array_map(fn($p) => $p['supplier_name'], $this->data['products'])); 

  }
  
  /* VIEWS */
  public function index($params)
  {
    
    echo '<pre>GET data: ';
    var_dump($_GET['filter'] ?? 'no GET');
    echo '</pre>';

    $this->renderView('Products', $this->data);
  }

  public function filterSuppliers() {
    // if (!isset($_POST['suppliers'])) {  
    //   header('location: ' . URL_ROOT . '/products');
    //   exit;
    // }
    
    $filtered = array_filter($this->data['products'], function($product) {
      foreach($_POST['suppliers'] as $supplier) {
        if (strtolower($product['supplier_name']) === $supplier) {
          return true;
        }
      }
      return false;
    });
    
    //display products
    $this->displayProducts($filtered);
    echo json_encode($filtered);
  }

  private function displayProducts($products) {
    
  }

  public function cpus($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'CPUs';
    $this->data['products'] = $this->getProductsByCategory('cpu');
    $this->renderView('Products', $this->data);
  }

  public function motherboards($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['products'] = $this->getProductsByCategory('motherboard');
    $this->data['title'] = 'Motherboards';
    $this->renderView('Products', $this->data);
  }

  public function gpus($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'GPUs';
    $this->data['products'] = $this->getProductsByCategory('graphics card');
    $this->renderView('Products', $this->data);
  }

  public function rams($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'Rams';
    $this->data['products'] = $this->getProductsByCategory('ram');
    $this->renderView('Products', $this->data);
  }

  public function m2s($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'M2s';
    $this->data['products'] = $this->getProductsByCategory('m.2');
    $this->renderView('Products', $this->data);
  }

  public function power_supplies($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'Power Supplies';
    $this->data['products'] = $this->getProductsByCategory('power supply');
    $this->renderView('Products', $this->data);
  }

  public function cpu_coolers($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'CPU Coolers';
    $this->data['products'] = $this->getProductsByCategory('cpu cooler');
    $this->renderView('Products', $this->data);
  }

  public function pc_cases($params)
  {
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'PC Cases';
    $this->data['products'] = $this->getProductsByCategory('pc case');
    $this->renderView('Products', $this->data);
  }

  
  /* METHODS */  
  private function renderProduct($id)
  { 
    //get item
    $this->data['product'] = $this->getProductById($id);
    $this->data['title'] = $this->data['product']['item_name'];
    unset($this->data['products']);

    //no item found
    if (empty($this->data['title'])) {
      header('Location: ' . URL_ROOT . '/products');
      exit;
    }

    $this->renderView('Product', $this->data);
    exit;
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

  private function getProductsByCategory($cat)
  {
    $products =  $this->productCtrl->getProductsByCategory($cat);
    $products = $this->addUrlCategory($products);
    return $products;
  }

  private function getProductById($id)
  {
    $products = [$this->productCtrl->getProductById($id)];
    $this->addUrlCategory($products);

    return $products[0];
  }

  private function checkParams($params)
  {
    if (isset($params[0])) {
      $this->renderProduct($params[0]);
      exit;
    }
  }
}

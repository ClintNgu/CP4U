<?php

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller
{
  private $data = ['title' => 'PRODUCTS'];
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

    //get all unique suppliers
    $this->data['sidebar']['suppliers'] = array_unique(array_map(fn ($p) => $p['supplier_name'], $this->data['products']));
  }

  /* VIEWS */
  public function index($params)
  {
    // render product
    if (isset($params[1])) {
      $this->renderProduct($params[1]);
      exit;
    }

    // filter by categories
    if (isset($params[0]) && !empty($params[0])) {
      // invalid category
      if (!array_search($params[0], array_map('strtolower', $this->urlCategories))) {
        header('Location: ' . URL_ROOT . '/products');
        exit;
      }

      $this->data['title'] = strtoupper($params[0]);
      $this->data['products'] = array_values($this->filterCategory($params[0]));
    }

    //shuffle products
    shuffle($this->data['products']);


    // filter by suppliers via ajax
    if (isset($_POST['suppliers'])) {
      $this->filterSuppliers();
      exit;
    }

    //display products
    $this->renderView('Products', $this->data);
  }

  private function filterSuppliers()
  {
    $filtered = array_filter($this->data['products'], function ($product) {
      foreach ($_POST['suppliers'] as $supplier) {
        if (strtolower($product['supplier_name']) === $supplier) {
          return true;
        }
      }
      return false;
    });

    //display filtered products
    echo $this->displayFilteredProducts($filtered);
  }

  private function displayFilteredProducts($filtered)
  {
    $res = '';
    foreach ($filtered as $p) {
      [
        'item_name' => $name, 'image' => $img, 'price' => $price,
        'urlCategory' => $urlCategory, 'item_id' => $id,
      ] = $p;

      $res .= "<a href='" . URL_ROOT . "/products/$urlCategory/$id'>";
      $res .= "<div class='item d-flex flex-column align-items-center shadow p-1'>";
      $res .= "<img src='$img' class='img mt-auto' />";
      $res .= "<div class='caption d-flex justify-content-between w-100 px-3 pt-5'>";
      $res .= "<h6 class='pe-5'>$name</h6>";
      $res .= "<p>$$price</p>";
      $res .= "</div>";
      $res .= "</div>";
      $res .= "</a>";
    }

    return empty($res) ? "<h3>No Items Found!</h3>" : $res;
  }

  private function filterCategory($urlCat)
  {
    $filtered = array_filter($this->data['products'], function ($product) use ($urlCat) {
      // $filtered = array_filter($this->getProducts(), function($product) use ($urlCat) {
      return strtolower($product['urlCategory']) === $urlCat;
    });

    return $filtered;
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

  private function getProductById($id)
  {
    $products = [$this->productCtrl->getProductById($id)];
    $this->addUrlCategory($products);

    return $products[0];
  }
}

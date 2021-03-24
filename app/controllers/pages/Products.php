<?php

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller
{
  private $data = ['title' => 'Products'];
  private $productCtrl;

  public function __construct()
  {
    $this->productCtrl = new Product;

    //query all products
    $this->data['products'] = $this->getProducts();
  }

  private function addUrlCategory($products)
  {
    foreach ($products as $idx => ['category' => $cat]) {
      $products[$idx]['urlCategory'] = $this->setUrlCategory($cat);
    }
    return $products;
  }

  //weirdness going on over here ($products[$idx]['urlCategory'] = $this->setUrlSupplierName($supp);)
  private function addUrlSupplier($products)
  {
    foreach ($products as $idx => ['supplier_name' => $supp]) {
      $products[$idx]['urlCategory'] = $this->setUrlSupplierName($supp);
    }
    return $products;
  }

  private function setUrlCategory($cat)
  {
    $urlCat = '';
    switch (strtolower($cat)) {
      case 'cpu':
        $urlCat = 'CPUs';
        break;
      case 'motherboard':
        $urlCat = 'Motherboards';
        break;
      case 'graphics card':
        $urlCat = 'GPUs';
        break;
      case 'ram':
        $urlCat = 'Rams';
        break;
      case 'm.2':
        $urlCat = 'M2s';
        break;
      case 'power supply':
        $urlCat = 'Power_Supplies';
        break;
      case 'cpu cooler':
        $urlCat = 'Cpu_Coolers';
        break;
      case 'pc case':
        $urlCat = 'PC_Cases';
        break;
    }

    return $urlCat;
  }

  private function setUrlSupplierName($cat)
  {
    $urlCat = '';
    switch (strtolower($cat)) {
      case 'amd':
        $urlCat = 'AMD';
        break;
      case 'intel':
        $urlCat = 'INTEL';
        break;
      case 'asrock':
        $urlCat = 'ASRock';
        break;
      case 'asus':
        $urlCat = 'ASUS';
        break;
      case 'msi':
        $urlCat = 'MSI';
        break;
      case 'gigabyte':
        $urlCat = 'GIGABYTE';
        break;
      case 'corsair':
        $urlCat = 'CORSAIR';
        break;
      case 'gskill':
        $urlCat = 'G.SKILL';
        break;
      case 'noctua':
        $urlCat = 'Noctua';
        break;
      case 'samsung':
        $urlCat = 'SAMSUNG';
        break;
    }

    return $urlCat;
  }


  private function getProducts()
  {
    $products =  $this->productCtrl->getProducts();
    $products = $this->addUrlCategory($products);
    return $products;
  }

  private function getProductsByCategory($cat)
  {
    $products =  $this->productCtrl->getProductsByCategory($cat);
    $products = $this->addUrlCategory($products);
    return $products;
  }

  private function getProductsBySupplierName($supp)
  {
    $products =  $this->productCtrl->getProductsBySupplierName($supp);
    $products = $this->addUrlSupplier($products);
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

  public function index($params)
  {
    $this->renderView('Products', $this->data);
  }

  public function cpus($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'CPUs';
    $this->data['products'] = $this->getProductsByCategory('cpu');
    $this->renderView('Products', $this->data);
  }

  public function motherboards($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['products'] = $this->getProductsByCategory('motherboard');
    $this->data['title'] = 'Motherboards';
    $this->renderView('Products', $this->data);
  }

  public function gpus($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'GPUs';
    $this->data['products'] = $this->getProductsByCategory('graphics card');
    $this->renderView('Products', $this->data);
  }

  public function rams($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'Rams';
    $this->data['products'] = $this->getProductsByCategory('ram');
    $this->renderView('Products', $this->data);
  }

  public function m2s($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'M2s';
    $this->data['products'] = $this->getProductsByCategory('m.2');
    $this->renderView('Products', $this->data);
  }

  public function power_supplies($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'Power Supplies';
    $this->data['products'] = $this->getProductsByCategory('power supply');
    $this->renderView('Products', $this->data);
  }

  public function cpu_coolers($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'CPU Coolers';
    $this->data['products'] = $this->getProductsByCategory('cpu cooler');
    $this->renderView('Products', $this->data);
  }

  public function pc_cases($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'PC Cases';
    $this->data['products'] = $this->getProductsByCategory('pc case');
    $this->renderView('Products', $this->data);
  }


  public function amd($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'AMD';
    $this->data['products'] = $this->getProductsBySupplierName('amd');
    $this->renderView('Products', $this->data);
  }

  public function intel($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'INTEL';
    $this->data['products'] = $this->getProductsBySupplierName('intel');
    $this->renderView('Products', $this->data);
  }

  public function asrock($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'ASRock';
    $this->data['products'] = $this->getProductsBySupplierName('asrock');
    $this->renderView('Products', $this->data);
  }

  public function asus($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'ASUS';
    $this->data['products'] = $this->getProductsBySupplierName('asus');
    $this->renderView('Products', $this->data);
  }

  public function msi($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'MSI';
    $this->data['products'] = $this->getProductsBySupplierName('msi');
    $this->renderView('Products', $this->data);
  }

  public function gigabyte($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'GIGABYTE';
    $this->data['products'] = $this->getProductsBySupplierName('gigabyte');
    $this->renderView('Products', $this->data);
  }

  public function corsair($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'CORSAIR';
    $this->data['products'] = $this->getProductsBySupplierName('corsair');
    $this->renderView('Products', $this->data);
  }

  public function gskill($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'GSKILL';
    $this->data['products'] = $this->getProductsBySupplierName('gskill');
    $this->renderView('Products', $this->data);
  }

  public function evga($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'EVGA';
    $this->data['products'] = $this->getProductsBySupplierName('evga');
    $this->renderView('Products', $this->data);
  }

  public function noctua($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'Noctua';
    $this->data['products'] = $this->getProductsBySupplierName('noctua');
    $this->renderView('Products', $this->data);
  }

  public function samsung($params)
  {
    //check params
    $this->checkParams($params);

    //render view
    $this->data['title'] = 'SAMSUNG';
    $this->data['products'] = $this->getProductsBySupplierName('samsung');
    $this->renderView('Products', $this->data);
  }
}

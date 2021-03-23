<?php 

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller {
  private $data = ['title' => 'Products'];

  public function __construct() {
    $productCtrl = new Product;
    
    //query all products
    $this->data['products'] =  $productCtrl->getProducts();
    $this->addUrlCategory();
  }

  private function addUrlCategory() {
    foreach ($this->data['products'] as $idx => ['category' => $cat]) {
      $this->data['products'][$idx]['urlCategory'] = $this->setUrlCategory($cat);
    }
  }

  private function setUrlCategory($cat) {
    $urlCat = '';
    switch (strtolower($cat)) {
      case 'cpu': 
        $urlCat = 'cpus';
        break;
      case 'motherboard': 
        $urlCat = 'motherboards';
        break;
      case 'graphics card': 
        $urlCat = 'graphics_cards';
        break;
      case 'ram': 
        $urlCat = 'rams';
        break;
      case 'm.2': 
        $urlCat = 'm2s';
        break;
      case 'power supply': 
        $urlCat = 'power_supplies';
        break;
      case 'power supply': 
        $urlCat = 'power_supplies';
        break;
      case 'cpu cooler': 
        $urlCat = 'cpu_coolers';
        break;
      case 'pc case': 
        $urlCat = 'pc_cases';
        break;
    }

    return $urlCat;
  }

  private function filterProducts($catname, $cat='category') {
    return array_filter(
      $this->data['products'], 
      fn ($product) => strtolower($product[$cat]) === $catname
    );
  }
  
  public function index($params) {
    $this->renderView('Products', $this->data);
  } 
  
  public function cpus($params) {
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
    $this->data['products'] = $this->filterProducts('cpu');
    $this->data['products']['category'] = 'cpus';
    $this->renderView('Products', $this->data);
  }
  
  public function motherboards($params) {
    $this->data['products'] = $this->filterProducts('motherboard');
    $this->renderView('Products', $this->data);
  }
  
  public function graphics_cards($params) {
    $this->data['products'] = $this->filterProducts('graphics card');
    $this->renderView('Products', $this->data);
  }

  public function rams($params) {
    $this->data['products'] = $this->filterProducts('ram');
    $this->renderView('Products', $this->data);
  }
  
  public function m2s($params) {
    $this->data['products'] = $this->filterProducts('m.2');
    $this->renderView('Products', $this->data);
  }
  
  public function power_supplies($params) {
    $this->data['products'] = $this->filterProducts('power supply');
    $this->renderView('Products', $this->data);
  }
  
  public function cpu_coolers($params) {
    $this->data['products'] = $this->filterProducts('cpu cooler');
    $this->renderView('Products', $this->data);
  }
  
  public function pc_cases($params) {
    $this->data['products'] = $this->filterProducts('pc case');
    $this->renderView('Products', $this->data);
  }
  
  public function product($params) {
    //query item
    $this->data['product'] = $this->data['products'] = $this->filterProducts($params[0] ?? -1, 'item_id');
    
    //set title page to item name
    $this->data['title'] = $this->data['item_name'] ?? '';
    
    //redirect to products page if null item
    if ($this->data['title'] === '') {
      header('Location: '. URL_ROOT . '/products');
      exit;
    }
    
    //render view
    $this->renderView('Product', $this->data);
  }
}
<?php 

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller {
  private $data = ['title' => 'Products'];

  public function __construct() {
    $productCtrl = new Product;
    
    //query all products
    $this->data['products'] =  $productCtrl->getProducts();
  }
  
  public function index($params) {

    $this->renderView('Products', $this->data);
  } 

  private function filterProducts($catname, $cat='category') {
    return array_filter(
      $this->data['products'], 
      fn ($product) => strtolower($product[$cat]) === $catname
    );
  }
  
  public function cpus($params) {
    $this->data['products'] = $this->filterProducts('cpu');
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
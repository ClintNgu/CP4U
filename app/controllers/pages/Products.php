<?php 

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller {
  private $data = ['title' => 'Products'];
  private $productCtrl;
   

  public function __construct() {
    $this->productCtrl = new Product;
  }
  
  public function index($params) {
    
    // echo '<pre>';
    // var_dump($_SESSION['User']);
    // echo '</pre>';
    
    //query all products
    $products = $this->productCtrl->getProducts();
    $this->data['products'] =  $products;

    //render view
    $this->renderView('Products', $this->data);
  } 
  
  public function product($params) {
    // query item 
    $product = $this->productCtrl->getProduct($params[0] ?? -1);

    //item does not exist
    if (!$product) {
      header('Location: '. URL_ROOT . '/products');
      exit;
    }

    $this->data['title'] = $product['item_name'];
    $this->data['product'] =  $product;
    
    //render view
    $this->renderView('Product', $this->data);
  }
}
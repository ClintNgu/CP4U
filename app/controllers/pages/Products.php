<?php 

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller {
  private $data = ['title' => 'Products'];

  public function index($params) {

    echo '<pre>';
    var_dump($_SESSION['User']);
    echo '</pre>';
    
    //render view
    $this->renderView('Products', $this->data);
  } 
  
  public function product($params) {
    $this->data['item_id'] = $params[0] ?? -1;
    
    // query item 
    $productCtrl = new Product;
    $product = $productCtrl->getProduct($this->data['item_id']);
    $this->data['title'] = $product['item_name'] ?? 'Not Found';
    
    //render view
    $this->renderView('Product', $this->data);
  }
}
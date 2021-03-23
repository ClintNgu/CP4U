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
    // query item 
    $productCtrl = new Product;
    $product = $productCtrl->getProduct($params[0] ?? -1);

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
<?php 

use app\core\Controller;

class Products extends Controller {
  private $data = ['title' => 'Products'];

  public function index($params) {

    //render view
    $this->renderView('Products', $this->data);
  } 
  
  public function product($params) {
    $this->data['title'] = 'Product Name';
    $this->data['item_id'] = $params[0] ?? -1;
    
    //render view
    $this->renderView('Product', $this->data);
  }
}
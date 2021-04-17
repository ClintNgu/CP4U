<?php 

use app\core\Controller;

class MyOrders extends Controller {
  private $data = ['title' => 'My Orders'];

  public function index() {
    
    $this->renderView('MyOrders', $this->data);
  }
}
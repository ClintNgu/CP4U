<?php

use app\core\Controller;

class ThankYou extends Controller {
  private $data = ['title' => 'Thank you'];
  private $ordersCtrl;

  public function index() {
    $this->ordersCtrl = $this->loadModel('Order'); // init order controller

    // did not enter page through checkout
    if (!isset($_POST['purchaseBtn'])) {
      header('location: ' . URL_ROOT . '/products'); 
      die;
    }
    
    // insert order(s) into db
    $orderDate = date('Y-m-d H:i:s');
    foreach($_SESSION['Cart'][$_SESSION['cartId']] as $cartItem) {
      [ 'id' => $item_id, 'quantity' => $quantity, ] = $cartItem;
      $data = [ 
        'quantity' => $quantity, 
        'order_date' => $orderDate, 
        'item_id' => $item_id, 
        'user_id' => $_SESSION['cartId'], 
      ];

      $this->ordersCtrl->addOrder($data);
    }

    unset($_SESSION['Cart'][$_SESSION['cartId']]);

    $this->renderView('ThankYou', $this->data);
  }
}
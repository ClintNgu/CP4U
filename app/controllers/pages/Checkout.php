<?php

use app\core\Controller;

class Checkout extends Controller
{
  private $data = ['title' => 'Checkout'];

  public function index($params)
  {
    if (!isset($_SESSION['Cart'][$_SESSION['cartId']])) {
      header('location: ' . URL_ROOT . '/products');
      die;
    }

    // send cart items to view
    $this->data['Cart'] = $_SESSION['Cart'][$_SESSION['cartId']];

    //render view
    $this->renderView('Checkout', $this->data);
  }
}

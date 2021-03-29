<?php

use app\core\Controller;

class Cart extends Controller
{
  private $data = ['title' => 'Cart',];

  public function index($params)
  { 
    // new item added to cart
    if (isset($_POST['cartSubmit'])) {
      $this->handleNewCartItem();
    }

    // ajax requests
    if (isset($_POST['clearAll'])) {
      $this->ajaxRequests();
    }

    $this->data['Cart'] = $_SESSION['Cart'] ?? null;

    //render view
    $this->renderView('Cart', $this->data);
  }
  
  private function handleNewCartItem() {
    // init cart
    if (!isset($_SESSION['Cart'])) {
      $_SESSION['Cart'] = [];
    }   
    
    // add item to cart
    unset($_POST['cartSubmit']);
    array_push($_SESSION['Cart'], $_POST);
    unset($_POST);

    // redirect to prevent duplicate POST on page refresh
    header('Location: '. URL_ROOT . '/Cart');
    die;
  }
  private function ajaxRequests() {
    // clear all items in cart
    if (isset($_POST['clearAll'])) {
      $_SESSION['Cart'] = [];
      $this->data['Cart'] = $_SESSION['Cart'];
      echo 'No Items in Cart!';
      die;
    }

  }
}

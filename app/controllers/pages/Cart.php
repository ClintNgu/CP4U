<?php

use app\core\Controller;

class Cart extends Controller
{
  private $data = ['title' => 'Cart'];

  public function index($params)
  {
    header('location: ' . URL_ROOT . '/cart');
    var_dump($_POST);
    //render view
    $this->renderView('Cart', $this->data);
  }
}

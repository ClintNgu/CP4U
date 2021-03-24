<?php

use app\core\Controller;

class Cart extends Controller
{
  private $data = ['title' => 'Cart'];

  public function index($params)
  {
    //render view
    $this->renderView('Cart', $this->data);
  }
}

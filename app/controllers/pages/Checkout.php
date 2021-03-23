<?php

use app\core\Controller;

class Checkout extends Controller
{
  private $data = ['title' => 'Checkout'];

  public function index($params)
  {
    //render view
    $this->renderView('Checkout', $this->data);
  }
}

<?php

use app\core\Controller;

class Cart extends Controller
{
  private $data = ['title' => 'Admin_Product'];

  public function index($params)
  {

    //render view
    $this->renderView('Admin_Product', $this->data);
  }
}

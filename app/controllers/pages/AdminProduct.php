<?php

use app\core\Controller;

class AdminProduct extends Controller
{
  private $data = ['title' => 'AdminProduct'];

  public function index($params)
  {

    //render view
    $this->renderView('AdminProduct', $this->data);
  }
}

<?php

use app\core\Controller;

class AddItem extends Controller
{
  private $data = ['title' => 'AddItem'];

  public function index($params)
  {
    //render view
    $this->renderView('AddItem', $this->data);
  }
}

<?php

use app\core\Controller;

class Admin extends Controller
{
  private $data = ['title' => 'Admin'];

  public function index($params)
  {
    //render view
    $this->renderView('Admin', $this->data);
  }
}

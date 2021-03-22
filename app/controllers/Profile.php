<?php

use app\core\Controller;

class Profile extends Controller
{
  private $data = ['title' => 'Profile'];

  public function index($param)
  {
    //render view
    $this->renderView('Profile', $this->data);
  }
}

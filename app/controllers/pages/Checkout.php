<?php

use app\core\Controller;

class Checkout extends Controller
{
  private $data = ['title' => 'Checkout'];

  public function index($params)
  {

    $this->data['Cart'] ??= $_SESSION['Cart'];

    if (isset($_POST['placeOrder'])) {
    }

    //render view
    $this->renderView('Checkout', $this->data);
  }
}

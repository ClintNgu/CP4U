<?php

use app\core\Controller;

class Product extends Controller
{
  private $data = ['title' => 'Product'];

  public function index($params)
  {
    //check POST
    if (isset($_POST['addToCartSubmit'])) {
      echo "cart button clicked";
    }

    //render view
    $this->renderView('Product', $this->data);
  }
}

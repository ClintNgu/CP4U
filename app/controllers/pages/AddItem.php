<?php

use app\core\Controller;

class AddItem extends Controller
{
  private $data = ['title' => 'AddItem'];

  public function index($params)
  {
    if (isset($_POST['addItemSubmit'])) {
      echo "add item button";
    }
    //render view
    $this->renderView('AddItem', $this->data);
  }
}

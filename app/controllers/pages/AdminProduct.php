<?php

use app\core\Controller;

class AdminProduct extends Controller
{
  private $data = ['title' => 'AdminProduct'];

  public function index($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo "Something posted";

      if (isset($_POST['updateItemSubmit'])) {
        echo "update button clicked";
      }
      if (isset($_POST['deleteItemSubmit'])) {
        echo "delete button clicked";
      }
    }
    //render view
    $this->renderView('AdminProduct', $this->data);
  }
}

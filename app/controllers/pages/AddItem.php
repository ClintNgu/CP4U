<?php

use app\core\Controller;
use app\controllers\Product;

class AddItem extends Controller
{
  private $data = ['title' => 'AddItem'];

  public function index($params)
  {
    //check POST
    if (isset($_POST['addItemSubmit'])) {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $this->data = array_merge($this->data, $_POST);

      if (!$this->isEmptyFields()) {
        $this->addProduct();
      }
    }

    //render view
    $this->renderView('AddItem', $this->data);
  }

  private function isEmptyFields()
  {
    foreach ($_POST as $_ => $val) {
      if (empty($val)) {
        $this->data['emptyFields'] = '*Fields Cannot Be Empty*';
        return true;
      }
    }

    return false;
  }

  private function addProduct()
  {
    //insert product to db
    $product = new Product;
    $product->insertProduct($this->data);

    //display insert success
    echo "Insertion successful";
  }
}

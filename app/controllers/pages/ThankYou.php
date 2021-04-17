<?php

use app\core\Controller;

class ThankYou extends Controller {
  private $data = ['title' => 'Thank you'];

  public function index() {
    // echo 'post: <pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // echo 'session: <pre>';
    // var_dump($_SESSION);
    // echo '</pre>';

    // TODO: save cart to db
    unset($_SESSION['Cart'][$_SESSION['cartId']]);

    $this->renderView('ThankYou', $this->data);
  }
}
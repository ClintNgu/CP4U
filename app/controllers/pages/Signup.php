<?php

use app\core\Controller;
use app\controllers\User;

class Signup extends Controller
{
  private $data = ['title' => 'Sign Up'];

  public function index($params)
  {
    //check POST
    if (isset($_POST['signupSubmit'])) {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $this->data = array_merge($this->data, $_POST);

      if (!$this->isEmptyFields()) {
        $this->signup();
      }
    }

    //render view
    $this->renderView('Signup', $this->data);
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

  private function signup()
  {
    //insert user to db
    $user = new User;
    $user->signup($this->data);

    //display signup success
    $_SESSION['signup'] = '*Successfully Created Account*';

    //redirect to login page
    header('Location: ' . URL_ROOT . '/login');
  }
}

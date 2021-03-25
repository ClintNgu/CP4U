<?php

use app\core\Controller;
use app\controllers\User;

class Login extends Controller
{
  private $data = ['title' => 'Login', 'textColor' => 'text-danger'];

  public function index($params)
  {
    //redirect if user is signed in
    if (isset($_SESSION['User'])) {
      header('location: ' . URL_ROOT . '/products');
      exit;
    }

    //check if redirected from sign up page
    if (isset($_SESSION['signup'])) {
      $this->data['signup'] = $_SESSION['signup'];
      $this->data['textColor'] = 'text-success';
      unset($_SESSION['signup']);
    }

    //check login submit
    if (isset($_POST['loginSubmit'])) {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $this->data = array_merge($this->data, $_POST);

      if (!$this->isEmptyFields()) {
        $this->login();
      }
    }

    //render view
    $this->renderView('Login', $this->data);
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

  private function login()
  {
    //insert user to db
    $user = new User;
    $userRow = $user->login($this->data);

    if (!$userRow) {
      $this->data['emptyFields'] = '*Incorrect Username or Password*';
      return;
    }

    $_SESSION['User'] = $userRow;
    unset($_SESSION['User']['pass']);
    header('Location: ' . URL_ROOT . '/products');
  }

  public function signout()
  {
    unset($_SESSION['User']);
    header('Location: ' . URL_ROOT);
  }
}

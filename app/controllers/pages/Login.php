<?php

use app\core\Controller;
use app\controllers\User;

class Login extends Controller
{
    private $data = ['title' => 'Login'];

    public function index($params) {

      //check if redirected from sign up page
      if (isset($_SESSION['signup'])) {
        $this->data['signup'] = $_SESSION['signup'];
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

    private function isEmptyFields() {
      foreach ($_POST as $_ => $val) {
        if (empty($val)) {
          $this->data['emptyFields'] = '*Fields Cannot Be Empty*';
          return true;
        }
      }

      return false;
    }

    private function login() {
      //insert user to db
      $user = new User;
      $userRow = $user->login($this->data);
      
      if (!$userRow) {
        $this->data['emptyFields'] = '*Incorrect Username or Password*';
      } else {
        // start session
        $_SESSION['User'] = $userRow;
      }

      //redirect to products page
      header('Location: ' . URL_ROOT . '/products');
    }
}

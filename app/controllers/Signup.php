<?php
use app\core\Controller;
use app\controllers\User;

class Signup extends Controller {
  private $data = ['title' => 'Signup'];
  
  public function index($params) {
    //check POST
    if (isset($_POST['signupSubmit'])) {
      $this->data = array_merge($this->data, $_POST);
      
      if (!$this->isEmptyFields()) {
        $this->post();
      }
    }

    //render view
    $this->renderView('Signup', $this->data);
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

  private function post() {
    //insert user to db
    $user = new User;
    $user->signup($this->data);

    //redirect to login page
    header('Location: ' . URL_ROOT . '/login');
  }
}
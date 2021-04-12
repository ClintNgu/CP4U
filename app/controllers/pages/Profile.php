<?php

use app\core\Controller;
use app\controllers\User;

class Profile extends Controller
{
  private $data = ['title' => 'Profile'];
  private static $userCtrl;

  public function __construct()
  {
    self::$userCtrl = new User;
  }

  public function index($param)
  {
    $user_id = $_SESSION["User"];

    if (isset($_POST['saveButton'])) {
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

      if ($password == "" || $confirmPassword == "") {
        $this->data['emptyPassword'] = '*Fields Cannot Be Empty*';
      } else if ($password != $confirmPassword) {
        $this->data['emptyPassword'] = '*Passwords Don\'t Match*';
      } else {
        $user = [
          'pass' => $password,
          'id' => $user_id['user_id'],
        ];

        //update password
        self::$userCtrl->updateUser($user);
        $this->data['successChange'] = '*Password was changed*';
      }
    }

    if (isset($_POST['cancelButton'])) {
      header("Refresh:0");
    }

    // if (isset($_POST['deleteButton'])) {
    //   self::$userCtrl->deleteUser($user_id['user_id']);
    //   header('Location: ' . URL_ROOT . '/signup');
    //   die;
    // }

    //render view
    $this->renderView('Profile', $this->data);
  }
}

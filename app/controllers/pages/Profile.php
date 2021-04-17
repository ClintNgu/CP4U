<?php

use app\core\Controller;
use app\controllers\User;

class Profile extends Controller
{
  private $data = ['title' => 'Profile'];
  private static $userCtrl;

  public function __construct() {
    self::$userCtrl = new User;
  }

  public function index($param) {
    // no user logged in
    if (!isset($_SESSION['User'])) {
      header('Location: ' . URL_ROOT . '/products');
      die;
    }
    
    if (isset($_SESSION['updateMsg'])) {
      $this->data['updateMsg'] = $_SESSION['updateMsg'];
      unset($_SESSION['updateMsg']);
    }
    
    // update user POST
    if(isset($_POST['profileUpdateBtn'])) {
      $this->updateUser();
      die;
    }
    
    // delete user POST
    if(isset($_POST['profileDeleteBtn'])) {
      $this->deleteUser();
      die;
    }
    
    //render view
    $this->renderView('Profile', $this->data);
  }
  
  private function updateUser() {
    unset($_POST['profileUpdateBtn']);
    self::$userCtrl->updateUser($_POST);
    
    $_SESSION['User'] = self::$userCtrl->getUserById($_POST['id']);
    $_SESSION['updateMsg'] = '* Profile Updated Successfully *';
    
    header('Location: ' . URL_ROOT . '/profile'); // prevent dupe POST 
  }
  
  private function deleteUser() {
    self::$userCtrl->deleteUser($_POST['id']);
    $_SESSION['profileDeleteMsg'] = '* Profile Deleted Successfully *';
    header('Location: ' . URL_ROOT . '/products');
  }
}

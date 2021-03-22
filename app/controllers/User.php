<?php 
namespace app\controllers;

use app\core\Controller;

class User extends Controller {
  private $model;

  public function __construct() {
    //init model
    $this->model = $this->loadModel('User'); 
  }

  public function signup($post) {
    $userInfo = [
      'fname' => $post['fname'],
      'lname' =>  $post['lname'],
      'username' => $post['username'],
      'email' =>  $post['email'],
      'pass' =>  $post['pass'],
      'street' =>  $post['street'],
    ];

    //insert user to db
    $this->model->signup($userInfo);
  }
}
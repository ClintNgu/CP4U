<?php

namespace app\controllers;

use app\core\Controller;

class User extends Controller
{
  private $model;

  public function __construct()
  {
    //init model
    $this->model = $this->loadModel('User');
  }

  public function login($post)
  {
    $userInfo = [
      'username' => $post['emailOrUser'],
      'email' => $post['emailOrUser'],
      'pass' =>  $post['pass'],
    ];

    //return user row
    return $this->model->login($userInfo);
  }

  public function signup($post)
  {
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

  public function getUserById($id)
  {
    return $this->model->getUserById($id);
  }

  public function updateUser($data)
  {
    return $this->model->updateUser($data);
  }

  public function deleteUser($user_id)
  {
    return $this->model->deleteUser($user_id);
  }
}

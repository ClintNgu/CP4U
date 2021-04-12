<?php

use app\core\Controller;

class Profile extends Controller
{
  private $data = ['title' => 'Profile'];

  public function index($param)
  {
    $user = $_SESSION["User"];

    if (isset($_POST['saveButton'])) {
      echo "User ID: " . $user['user_id'];
    }

    //render view
    $this->renderView('Profile', $this->data);
  }
}

<?php
use app\core\Controller;

class Signup extends Controller {
  private $data = ['title' => 'Signup'];
  
  public function index($params) {
    $this->renderView('Signup', $this->data);
  }
}
<?php
use app\core\Controller;

class Home extends Controller {
  private $data = ['title' => 'Home'];
  
  public function index($params) {
    $this->renderView('Home', $this->data);
  }
}
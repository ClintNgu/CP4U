<?php 
namespace app\controllers;

use app\core\Controller;

class Product extends Controller {
  private $model;

  public function __construct() {
    //init model
    $this->model = $this->loadModel('Product'); 
  }
}

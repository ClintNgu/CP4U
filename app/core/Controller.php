<?php 
namespace app\core;

class Controller {
  protected function loadModel($model) {
    if (file_exists(APP_ROOT . "/models/$model.php")) {
      require_once APP_ROOT . "/models/$model.php";
      return new $model();
    }
  }

  protected function renderView($view, $data = []) {
    if (file_exists(APP_ROOT . "/views/pages/$view.php")) {
      require_once APP_ROOT . "/views/pages/$view.php";
    }
  }
  
}
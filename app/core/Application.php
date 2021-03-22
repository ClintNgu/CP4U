<?php 
class Application {

  private $controller = 'Login';
  private $callback = 'index';
  private $params = [];

  public function run(){
    //get url from GET
    $urls = $this->splitUrl();

    //get controller
    if (file_exists(APP_ROOT . "/controllers/$urls[0].php")) {
      $this->controller = $urls[0];
      unset($urls[0]);
    }
    
    //get callback
    if (isset($urls[1]) && method_exists($this->controller, $urls[1])) {
      $this->callback = $urls[1];
      unset($urls[1]);
    }

    //set params
    $this->params = array_values($urls);

    //get controller class
    require APP_ROOT . "/controllers/$this->controller.php";
    $this->controller = new $this->controller;

    //call callback method
    call_user_func([$this->controller, $this->callback], $this->params);
  }
  
  private function splitUrl() {
    $url = $_GET['url'] ?? '/';
    return explode('/', ucwords(strtolower($url)));
  }
}
<?php

use app\core\Controller;

class Login extends Controller
{
    private $data = ['title' => 'Login'];

    public function index($params)
    {
        if ($_POST) {
        }

        $this->renderView('Login', $this->data);
    }
}

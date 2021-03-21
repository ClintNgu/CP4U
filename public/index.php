<?php
require_once dirname(__DIR__) . '/app/core/config.php';
require_once APP_ROOT . '/vendor/autoload.php';
require_once APP_ROOT . '/core/Application.php';

session_start();

$app = new Application;
$app->run(); 

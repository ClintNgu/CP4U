<?php
require_once dirname(__DIR__) . '/app/core/config.php';
require_once APP_ROOT . '/vendor/autoload.php';
require_once APP_ROOT . '/core/Application.php';

// start session
session_start();

// run app
new Application;



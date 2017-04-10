<?php
// Relative path to your application root folder
$apppath = __DIR__ . '/../app';

// Enable autoloader
include __DIR__ . "/../vendor/autoload.php";

// Include framework bootstrap
include __DIR__ . "/../vendor/drmvc/framework/src/bootstrap.php";

// Start session
DrMVC\Core\Session::init();

// Render current page
DrMVC\Core\Request::factory(true)->execute()->render();

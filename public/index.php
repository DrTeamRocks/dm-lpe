<?php
// Enable autoloader
include __DIR__ . "/../vendor/autoload.php";

// Set path of the application directory
define('APPPATH', __DIR__ . '/../app/');

// Default configurations
DrMVC\Core\Config::load('config');

// Apply routes
DrMVC\Core\Config::load('routes');

// Start session
DrMVC\Core\Session::init();

// Render current page
DrMVC\Core\Request::factory(true)->execute()->render();

<?php
// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)) . '/engine/vendor/drteam/drmvc-framework/' . DIRECTORY_SEPARATOR);

$application = '../../../../engine'; // Applcations specifed directory.
$modules = 'Modules'; // Modules location.
$system = 'System'; // System base classes location.

if (!is_dir($application) AND is_dir(DOCROOT . $application)) $application = DOCROOT . $application;
if (!is_dir($modules) AND is_dir(DOCROOT . $modules)) $modules = DOCROOT . $modules;
if (!is_dir($system) AND is_dir(DOCROOT . $system)) $system = DOCROOT . $system;

// Define the absolute paths for configured directories
define('APPPATH', realpath($application) . DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules) . DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system) . DIRECTORY_SEPARATOR);

// Clean up the configuration vars
unset($application, $modules, $system);

$check_config = false;

// Bootstrap the application
require SYSPATH . 'bootstrap.php';

use \System\Core\Url;

// TODO: Check if config exist
if (file_exists(APPPATH . 'Configs/config.php')) {
    Url::redirect('dashboard');
} else {
    include "header.php";
    include "step_0.php";
    include "footer.php";
}

switch ($_GET['step']) {
    // TODO: Step 1 - Configure database
    case '1':
        echo '1';
        break;
    // TODO: Step 2 - Upload demo
    case '2':
        echo '2';
        break;
}


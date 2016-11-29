<?php namespace Application\Controllers;

use System\Core\Controller;
use Application\Models\Settings as Model_Settings;
use Application\Models\Sections as Model_Sections;
use Application\Models\Users as Model_Users;

/**
 * Class Main
 * @package Application\Controllers
 */
class External extends Controller
{
    /**
     * @var Model_Settings
     */
    public $_settings;

    /**
     * @var Model_Sections
     */
    public $_sections;

    /**
     * @var Model_Users
     */
    public $_users;

    // Styles and Scripts
    public $styles_vendor;
    public $styles;
    public $scripts_vendor;
    public $scripts;

    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Vendor styles
        $this->styles_vendor = array(
            'tether/dist/css/tether.min.css',
            'bootstrap/dist/css/bootstrap.min.css',
            'font-awesome/css/font-awesome.min.css',
            'ubuntu-fontface/ubuntu.min.css',
        );
        // Site styles
        $this->styles = array(
            'colors.css',
            'styles.css',
            'indents.css'
        );

        // Vendor scripts
        $this->scripts_vendor = array(
            'jquery/dist/jquery.min.js',
            'jquery-ui/jquery-ui.min.js',
            'tether/dist/js/tether.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
        );
        // Site scripts
        $this->scripts = array(
            'footer_fix.js',
            'scripts.js',
        );

        $this->_settings = new Model_Settings();
        $this->_sections = new Model_Sections();
        $this->_users = new Model_Users();

        $this->language->load('index');
    }

}

<?php namespace Application\Controllers;

use System\Core\Controller;
use Application\Models\Authors as Model_Authors;
use Application\Models\Books as Model_Books;
use Application\Models\Chapters as Model_Chapters;

/**
 * Class Main
 * @package Application\Controllers
 */
class Internal extends External
{

    // Styles and Scripts
    public $styles_vendor;
    public $styles;
    public $scripts_vendor;
    public $scripts;

    // Other
    public $userinfo;

    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Vendor styles
        $this->styles_vendor = array(
            'bootstrap/dist/css/bootstrap.min.css',
            'font-awesome/css/font-awesome.min.css',
            'ubuntu-fontface/ubuntu.min.css',
        );
        // Site styles
        $this->styles = array(
            'sb-admin-2.css',
            'admin.css',
        );

        // Vendor scripts
        $this->scripts_vendor = array(
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
        );
        // Site scripts
        $this->scripts = array(
            'sb-admin-2.js',
            'active_url.js',
            'footer_fix.js',
        );
    }

}

<?php namespace Application\Controllers;

use System\Core\Controller;
use System\Core\Session;
use System\Core\Url;

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

    /**
     * User details
     * @var
     */
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
            'jquery-ui/jquery-ui.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
        );
        // Site scripts
        $this->scripts = array(
            //'active_url.js',
            'footer_fix.js',
            'scripts.js',
        );

        $id_user = Session::get('id_user');
        $this->userinfo = $this->_users->getUser($id_user);
        if (empty($this->userinfo)) Url::redirect('auth/login');

        $this->language->load('index');
    }

}

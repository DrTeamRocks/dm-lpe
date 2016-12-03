<?php namespace Application\Controllers;

use System\Core\Password;
use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

/**
 * Class Admin
 * @package Application\Controllers
 */
class Admin extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->userinfo->is_admin != 1) Url::redirect('editor');
    }

    /**
     * Default admin page dashboard
     */
    public function action_index()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'admin.js';
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['sections'] = $this->_sections->getAll();

        View::render('header', $data);
        View::render('admin/dashboard', $data);
        View::render('footer', $data);
    }

}

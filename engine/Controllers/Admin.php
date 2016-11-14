<?php namespace Application\Controllers;

use System\Core\View;

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
    }

    /**
     * Default admin page dashboard
     */
    public function action_index()
    {
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        View::render('admin/header', $data);
        View::render('admin/dashboard', $data);
        View::render('admin/footer', $data);
    }

    /**
     * Template page editor
     */
    public function action_template()
    {
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        View::render('admin/header', $data);
        View::render('admin/template');
        View::render('admin/footer', $data);
    }

}

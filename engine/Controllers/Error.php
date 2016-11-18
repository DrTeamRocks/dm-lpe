<?php namespace Application\Controllers;

use System\Core\View;

/**
 * Class Error
 * @package Application\Controllers
 */
class Error extends External
{
    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function action_index()
    {
        $data['title'] = $this->language->get('error');
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = array('404/404.css');
        $data['scripts'] = array();

        View::render('error', $data);
    }

}

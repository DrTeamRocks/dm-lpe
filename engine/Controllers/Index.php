<?php namespace Application\Controllers;

use System\Core\View;

/**
 * Class Index
 * @package Application\Controllers
 */
class Index extends External
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index page action
     */
    public function action_index()
    {


        // Receive all settings from database
//        $data['settings'] = $this->_settings->getAll();
//        $data['sections'] = $this->_sections->getSections();

        View::render('index', $data);
    }

}

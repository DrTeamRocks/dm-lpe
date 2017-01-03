<?php namespace Application\Controllers;

use System\Core\Controller;

/**
 * Class Index
 * @package Application\Controllers
 */
class Index extends Controller
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
        $this->view->render('templates/header');
        $this->view->render('index');
        $this->view->render('templates/footer');
    }

}

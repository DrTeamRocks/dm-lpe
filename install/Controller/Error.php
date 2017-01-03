<?php namespace Application\Controllers;

use System\Core\Controller;

/**
 * Class Error
 * @package Application\Controllers
 */
class Error extends Controller
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
        $this->view->render('error');
        $this->view->render('templates/footer');
    }

}

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
     * Index page action
     */
    public function action_index()
    {
        echo '/api/admin/';
    }

}

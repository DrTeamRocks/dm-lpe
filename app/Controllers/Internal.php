<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Session;
use DrMVC\Core\Url;

/**
 * Class Main
 * @package Application\Controllers
 */
class Internal extends External
{

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

        $id_user = Session::get('id_user');
        $this->userinfo = $this->_users->getUser($id_user);
        if (empty($this->userinfo)) Url::redirect('auth/login');
    }

}

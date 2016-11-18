<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Session;
use System\Core\Url;
use System\Core\Password;
use System\Core\Helpers;

use Application\Models\Users as Model_Users;

/**
 * Class Auth
 * @package Application\Controllers
 */
class Auth extends External
{
    public $_error;
    public $_users;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->_users = new Model_Users();
        $this->styles[] = 'admin/auth.css';
    }

    /**
     * Login page
     */
    public function action_login()
    {
        // Redirect to index if not empty
        if (!empty(Session::get('id_user'))) Url::redirect('admin');

        if (isset($_POST['submit'])) {
            sleep(1);
            $username = Helpers::cleaner($_POST['username']);
            $password = Helpers::cleaner($_POST['password']);

            // User in base check
            $userinfo = $this->_users->getUser($username, 'username');
            if (empty($userinfo->username)) {
                $this->_error[] = $this->language->get('email_wrong1');
            }

            // Password verification
            if (Password::verify($password, $this->_users->getHash($username)) == false) {
                $this->_error[] = $this->language->get('email_wrong2');
            }

            //print_r($this->_error);

            // If all is ok
            if (empty($this->_error)) {
                // Get user ID
                $id_user = $userinfo->id;

                // If user found
                if (!empty($id_user)) {
                    // Set native session params
                    Session::set('id_user', $id_user);

                    //error_log(print_r($this->userinfo,true));

                    // Params for update
                    $values = array('lastlogin_time' => date('Y-m-d H:i:s'));
                    $where = array('id' => $id_user);

                    // Update last login
                    $this->_users->update($values, $where);
                    Url::redirect('admin');
                    die();
                }
            }
            //die();
        }

        $data['title'] = $this->language->get('login');
        $data['error'] = $this->_error;

        $data['lng'] = $this->language;
        $data['userinfo'] = $this->userinfo;

        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        View::render('login', $data);
    }

    public function action_logout()
    {
        Session::destroy();
        Url::redirect();
        die();
    }

}

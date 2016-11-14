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
        if (!empty($this->userinfo))
            Url::redirect();

        if (isset($_POST['submit'])) {
            $email = Helpers::cleaner($_POST['email']);
            $password = Helpers::cleaner($_POST['password']);

            // User in base check
            $userinfo = $this->_users->getUser($email, 'email');
            if ($userinfo->email != $email) {
                $this->_error[] = $this->language->get('email_wrong1');
            }

            // Password verification
            if (Password::verify($password, $this->_users->getHash($email)) == false) {
                $this->_error[] = $this->language->get('email_wrong2');
            }

            // If all is ok
            if (empty($this->_error)) {
                // Get user ID
                $id_user = $userinfo->id;

                // If user found
                if (!empty($id_user)) {
                    // Set native session params
                    Session::set('loggedin', true);
                    Session::set('id_user', $id_user);

                    // Params for update
                    $values = array('time_lastlogin' => date('Y-m-d H:i:s'));
                    $where = array('id' => $id_user);

                    // Update last login
                    $this->_users->update($values, $where);
                    die();
                }
            }
        }

        $data['title'] = $this->language->get('login');
        $data['error'] = $this->_error;

        $data['lng'] = $this->language;
        $data['userinfo'] = $this->userinfo;

        $data['styles_vendor'] = $this->styles_vendor;
        $data['styles'] = $this->styles;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts'] = $this->scripts;

        View::render('admin/header_empty', $data);
        View::render('admin/login', $data);
        View::render('admin/footer', $data);
    }

//    public function action_register()
//    {
//        // Redirect to index if not empty
//        if (!empty($this->userinfo))
//            Url::redirect();
//
//        $data['title'] = $this->language->get('register');
//        $data['error'] = $this->_error;
//
//        $data['lng'] = $this->language;
//        $data['userinfo'] = $this->userinfo;
//
//        $data['styles_vendor'] = $this->styles_vendor;
//        $data['styles'] = $this->styles;
//        $data['scripts_vendor'] = $this->scripts_vendor;
//        $data['scripts'] = $this->scripts;
//
//        View::render('admin/header', $data);
//        View::render('auth/register', $data);
//        View::render('admin/footer', $data);
//    }

//    public function action_forgot()
//    {
//        // Redirect to index if not empty
//        if (!empty($this->userinfo))
//            Url::redirect();
//
//        $data['title'] = $this->language->get('forgot');
//        $data['error'] = $this->_error;
//
//        $data['lng'] = $this->language;
//        $data['userinfo'] = $this->userinfo;
//
//        $data['styles_vendor'] = $this->styles_vendor;
//        $data['styles'] = $this->styles;
//        $data['scripts_vendor'] = $this->scripts_vendor;
//        $data['scripts'] = $this->scripts;
//
//        View::render('admin/header', $data);
//        View::render('auth/forgot', $data);
//        View::render('admin/footer', $data);
//    }

    public function action_logout()
    {
        Session::destroy();
        Url::redirect();
        die();
    }

}

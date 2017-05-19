<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Session;
use DrMVC\Core\Url;
use DrMVC\Core\Password;

use DrMVC\Helpers\Cleaner;

use DrMVC\App\Models\Users as Model_Users;

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

        $this->view->data['styles'][] = 'auth.css';
    }

    /**
     * Login page
     */
    public function action_login()
    {
        // Redirect to index if not empty
        if (!empty(Session::get('id_user'))) Url::redirect('dashboard');

        if (isset($_POST['submit'])) {
            sleep(1);
            $username = Cleaner::run($_POST['username']);
            $password = Cleaner::run($_POST['password']);

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

                    // Params for update
                    $values = array('lastlogin_time' => date('Y-m-d H:i:s'));
                    $where = array('id' => $id_user);

                    // Update last login
                    if (!DEMO) $this->_users->update($values, $where);

                    // Chose user role
                    if (!empty($userinfo)) Url::redirect('site');
                    die();
                }
            }
            //die();
        }

        $this->view->data['title'] = $this->language->get('login');
        $this->view->data['error'] = $this->_error;

        $this->view->render('templates/header');
        $this->view->render('login');
        $this->view->render('templates/footer');
    }

    public function action_logout()
    {
        Session::destroy();
        Url::redirect();
        die();
    }

}

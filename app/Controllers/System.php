<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Password;
use DrMVC\Core\View;
use DrMVC\Helpers\Cleaner;
use DrMVC\Core\Url;

/**
 * Class Admin
 * @package Application\Controllers
 */
class System extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->userinfo->is_admin != 1) Url::redirect('dashboard');

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);
            switch ($mode) {
                case 'update':
                    sleep(1);
                    $id = Cleaner::run($_POST['id']);
                    $field = Cleaner::run($_POST['field']);
                    $value = Cleaner::run($_POST['value']);
                    $data = null;
                    $where = null;
                    switch ($field) {
                        case 'id_role':
                        case 'username':
                        case 'email':
                            echo "$id $field $value\n";
                            // What need update
                            $data = array($field => $value);
                            if (!empty($id)) {
                                // Selector
                                $where = array('id' => $id);
                                echo $this->_users->update($data, $where);
                            } else {
                                echo 'empty id';
                            }
                            break;
                    }
                    break;
                case 'add':
                    sleep(1);
                    $username = Cleaner::run($_POST['username']);
                    $email = Cleaner::run($_POST['email']);
                    $password = Cleaner::run($_POST['password']);
                    $password_again = Cleaner::run($_POST['password_again']);
                    $id_role = Cleaner::run($_POST['id_role']);
                    if (!empty($username) && !empty($email) && !empty($password)) {
                        if ($password == $password_again) {
                            // What need insert
                            $data = array(
                                'username' => $username,
                                'email' => $email,
                                'password' => Password::make($password),
                                'id_role' => 3,
                                'create_time' => date('Y-m-d H:i:s')

                            );
                            echo $this->_users->insert($data);
                        }
                    }

                    // Redirect to users list
                    Url::redirect('system/users');
                    break;
                case 'delete':
                    sleep(1);
                    $id = Cleaner::run($_POST['id']);

                    // If id is not empty
                    if (!empty($id)) {
                        $data = array('deleted' => true);
                        $where = array('id' => $id);
                        echo $this->_users->update($data, $where);
                    }
                    break;
            }
        }
    }

    public function action_users()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'system.js';
        $data['lng'] = $this->language;

        // Enable the new user button in top nav
        $data['add_user'] = true;

        // Receive all users
        $data['users'] = $this->_users->getAll();
        $data['roles'] = $this->_roles->getAll();

        $this->view->render('header', $data);
        $this->view->render('system/users', $data);
        $this->view->render('footer', $data);
    }

}

<?php namespace Application\Controllers;

use System\Core\Password;
use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

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
        if ($this->userinfo->is_admin != 1) Url::redirect('editor');

        if (isset($_POST['submit'])) {
            $mode = Helpers::cleaner($_POST['mode']);

            print_r($_POST);

            switch ($mode) {
                case 'update':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id']);
                    $field = Helpers::cleaner($_POST['field']);
                    $value = Helpers::cleaner($_POST['value']);
                    $data = null;
                    $where = null;

                    switch ($field) {
                        case 'id_role':
                        case 'username':
                        case 'email':

                            echo "$id $field $value\n";
                            //die();

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
            }
            die();
        }
    }

    /**
     * Default admin page dashboard
     */
    public function action_index()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'admin.js';
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['sections'] = $this->_sections->getAll();

        View::render('header', $data);
        View::render('admin/dashboard', $data);
        View::render('footer', $data);
    }

    public function action_users()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'admin.js';
        $data['lng'] = $this->language;

        // Receive all users
        $data['users'] = $this->_users->getAll();
        $data['roles'] = $this->_roles->getAll();

        View::render('header', $data);
        View::render('admin/users', $data);
        View::render('footer', $data);
    }

}

<?php namespace Application\Controllers;

use System\Core\Password;
use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

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
            $mode = Helpers::cleaner($_POST['mode']);
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

        // Receive all users
        $data['users'] = $this->_users->getAll();
        $data['roles'] = $this->_roles->getAll();

        View::render('header', $data);
        View::render('system/users', $data);
        View::render('footer', $data);
    }

}

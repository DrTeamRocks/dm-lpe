<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Url;

use DrMVC\Helpers\Cleaner;

/**
 * Class Dashboard
 * @package Application\Controllers
 */
class Dashboard extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);

            switch ($mode) {
                // Create new site mode
                case 'add':
                    sleep(1);
                    $url = Cleaner::run($_POST['url']);
                    $alias = Cleaner::run($_POST['alias']);

                    // If cleaned url is not empty
                    if (!empty($url)) {
                        $data['url'] = $url;
                        // We need update array if alias is not empty
                        if (!empty($alias)) $data['alias'] = $alias;
                        echo $this->_sites->insert($data);
                    } else {
                        echo 'error';
                    }

                    // Redirect to users list
                    Url::redirect('dashboard');

                    break;
            }
        }

        $this->view->data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
    }

    /**
     * Dashboard page for all users
     */
    public function action_index()
    {
        $this->view->data['sites'] = $this->_sites->getAll();
        $this->view->data['add_site'] = true;

        $this->view->render('templates/header');
        $this->view->render('templates/header_append');
        $this->view->render('dashboard');
        $this->view->render('templates/footer_prepend');
        $this->view->render('templates/footer');
    }

}

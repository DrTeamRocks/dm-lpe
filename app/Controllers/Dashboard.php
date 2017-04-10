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
    }

    /**
     * Dashboard page for all users
     */
    public function action_index()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['lng'] = $this->language;

        $data['sites'] = $this->_sites->getAll();
        $data['add_site'] = true;

        $this->view->render('header', $data);
        $this->view->render('dashboard', $data);
        $this->view->render('footer', $data);
    }

}

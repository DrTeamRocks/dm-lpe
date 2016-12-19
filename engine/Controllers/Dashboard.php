<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

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
            $mode = Helpers::cleaner($_POST['mode']);

            switch ($mode) {
                // Create new site mode
                case 'add':
                    sleep(1);
                    $url = Helpers::cleaner($_POST['url']);
                    $alias = Helpers::cleaner($_POST['alias']);

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

        View::render('header', $data);
        View::render('dashboard', $data);
        View::render('footer', $data);
    }

}

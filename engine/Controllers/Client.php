<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

/**
 * Class Client
 * @package Application\Controllers
 */
class Client extends Internal
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
                case 'update':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $json = Helpers::cleaner($_POST['json'], 'json');
                    // What need update
                    $data = array(
                        'variables' => $json,
                    );
                    // Selector
                    $where = array('id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $order = Helpers::cleaner($_POST['order'], 'num');
                    // What need update
                    $data = array('ordering' => $order);
                    // Selector
                    $where = array('id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
            }

        }
    }

    /**
     * Default client page dashboard
     */
    public function action_index()
    {
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'client.js';
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['sections'] = $this->_sections->getAll();

        View::render('client/header', $data);
        View::render('client/dashboard', $data);
        View::render('footer', $data);
    }

}

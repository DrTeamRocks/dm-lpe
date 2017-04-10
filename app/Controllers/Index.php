<?php namespace DrMVC\App\Controllers;

use DrMVC\Helpers\Cleaner;

/**
 * Class Index
 * @package Application\Controllers
 */
class Index extends External
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index page action
     */
    public function action_index()
    {
        $domain = Cleaner::run($_SERVER['HTTP_HOST']);
        $site = $this->_sites->getSite('domain', $domain);
        if (empty($site)) $this->_default();

        // Receive all settings from database
        $data['settings'] = $this->_settings->getSettings($site->id);
        $data['sections'] = $this->_sections->getSections($site->id);

        $this->view->data = $data;
        $this->view->render('index');
    }

}

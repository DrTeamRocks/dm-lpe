<?php namespace Application\Controllers;

use System\Core\Helpers;
use System\Core\View;

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
        $domain = Helpers::cleaner($_SERVER['HTTP_HOST']);
        $site = $this->_sites->getSite('domain', $domain);
        if (empty($site)) $this->_default();

        // Receive all settings from database
        $data['settings'] = $this->_settings->getSettings($site->id);
        $data['sections'] = $this->_sections->getSections($site->id);

        View::render('index', $data);
    }

}

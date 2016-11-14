<?php namespace Application\Controllers;

use System\Core\Controller;
use Application\Models\Settings as Model_Settings;
use Application\Models\Sections as Model_Sections;
use Application\Models\Users as Model_Users;

/**
 * Class Main
 * @package Application\Controllers
 */
class External extends Controller
{
    /**
     * @var Model_Settings
     */
    public $_settings;

    /**
     * @var Model_Sections
     */
    public $_sections;

    /**
     * @var Model_Users
     */
    public $_users;

    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->_settings = new Model_Settings();
        $this->_sections = new Model_Sections();
        $this->_users = new Model_Users();
    }

}

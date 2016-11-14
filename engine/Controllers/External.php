<?php namespace Application\Controllers;

use System\Core\Controller;
use Application\Models\Sections as Model_Sections;
use Application\Models\Users as Model_Users;
use Application\Models\Tokens as Model_Tokens;

/**
 * Class Main
 * @package Application\Controllers
 */
class External extends Controller
{
    /**
     * @var Model_Sections
     */
    public $_sections;
    public $_users;
    public $_tokens;

    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->_sections = new Model_Sections();
        $this->_users = new Model_Users();
        $this->_tokens = new Model_Tokens();
    }

}

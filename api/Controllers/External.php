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

    function get_description($code)
    {
        switch ($code) {
            case '0':
                $return['status'] = 'success';
                $return['description'] = 'ok';
                break;
            case '1':
                $return['status'] = 'success';
                $return['description'] = 'empty result';
                break;
            default:
                $return['status'] = 'error';
                $return['description'] = 'Something wrong!';
                break;
        }

        return $return;
    }

    function response($code, $data = array())
    {
        // Get code description
        $code_info = $this->get_description($code);
        // Create result
        $result = array(
            'code' => $code,
            'status' => $code_info['status'],
            'description' => $code_info['description'],
            'response' => $data
        );
        header('Content-type: application/json');
        echo json_encode($result);
        die();
    }
}

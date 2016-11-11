<?php namespace Application\Controllers;

use System\Core\Helpers;
use System\Core\Password;

use Application\Models\Users as Model_Users;
use Application\Models\Tokens as Model_Tokens;

/**
 * Class Auth
 * @package Application\Controllers
 */
class Auth extends External
{
    // For error
    public $_error;
    // Models
    public $_users;
    public $_tokens;

    public function __construct()
    {
        parent::__construct();

        $this->_users = new Model_Users();
        $this->_tokens = new Model_Tokens();
    }

    function generateRandomString($chars = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $string = '';
        for ($i = 0; $i < $chars; ++$i) {
            $string .= $characters[rand(0, $charactersLength - 1)];
        }
        return $string;
    }

    function generateToken()
    {
        $token =
            $this->generateRandomString(3)
            . md5($this->generateRandomString(32) . '_' . $this->generateRandomString(32))
            . $this->generateRandomString(4)
            . md5($this->generateRandomString(32) . '_' . $this->generateRandomString(32));

        return $token;
    }

    /**
     * User authorization method.
     *
     * IN:  email, password, remember
     * OUT: token
     */
    public function action_login()
    {
        $email = Helpers::cleaner($_POST['email']);
        $password = Helpers::cleaner($_POST['password']);
        $result = array();

        switch (true) {
            case (empty($email)):
                $code = '101';
                break;
            case (empty($password)):
                $code = '102';
                break;
            default:
                $code = '0';

                // User in base check
                $userinfo = $this->_users->getUser($email, 'email');
                if ($userinfo->login != $email) {
                    $code = '101';
                    $this->_error = true;
                }

                // Password verification
                if (Password::verify($password, $this->_users->getHash($email)) == false) {
                    $code = '102';
                    $this->_error = true;
                }

                // If we don't have errors, then generate token
                if ($this->_error !== true) {

                    // Refresh userdata
                    $data = array(
                        'lastlogin_time' => date('Y-m-d H:i:s')
                    );
                    // Then update into database
                    $this->_users->update($data, array('id' => $userinfo->id));

                    // First need generate the token
                    $token = $this->generateToken();
                    // Data for insertion
                    $data = array(
                        'id_user' => $userinfo->id,
                        'token' => $token,
                        'add_time' => date('Y-m-d H:i:s')
                    );
                    // Then update into database
                    $this->_tokens->insert($data);
                    // Now need add into answer
                    $result['token'] = $token;
                }
                break;
        }
        $this->response($code, $result);
    }

    /**
     * Kill user session.
     *
     * IN:  token
     * OUT: text
     */
    public function action_logout()
    {
        $token = Helpers::cleaner($_POST['token']);
        $result = array();

        switch (true) {
            case (empty($token)):
                $code = '100';
                break;
            default:
                $code = '1';

                // User in base check
                $userinfo = $this->_tokens->getUserByToken($token);
                if (!empty($userinfo)) {
                    $code = '104';
                    $this->_error = true;
                }

                // If we don't have errors, then generate token
                if ($this->_error !== true) {
                    // Where statements
                    $where = array(
                        'id_user' => $userinfo->id,
                        'token' => $token,
                    );
                    // Remove token from database
                    $this->_tokens->delete($where);
                }
                break;
        }
        $this->response($code, $result);
    }

}

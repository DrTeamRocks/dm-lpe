<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Controller;

use Application\Models\Install as Model_Install;

/**
 * Class Install
 * @package Application\Controllers
 */
class Install extends Controller
{
    public $_install;

    /**
     * Install constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->_install = new Model_Install();
    }

    /**
     * Index page action
     */
    public function action_index()
    {
        $tables = array(
            'users',
            'roles',
            'sites',
            'settings',
            'sections'
        );

        $i = 0;
        while ($i < count($tables)) {
            $name = $tables[$i];
            if ($this->_install->table_exist($name)) {
                echo "inf: Table `$name` exist<br/>\n";
            } else {
                echo "err: Table `$name` is not exist<br/>\n";

                $create_name = 'create_' . $name;
                $this->_install->$create_name();

                if ($this->_install->table_exist($name)) echo "inf: Table `$name` created<br/>\n";
                else echo "err: Table `$name` is not created<br/>\n";
            }
            $i++;
        }

    }

}

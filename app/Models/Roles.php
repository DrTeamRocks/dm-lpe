<?php namespace DrMVC\App\Models;

use DrMVC\Database\Model;

/**
 * Class Roles
 * @package Application\Models
 */
class Roles extends Model
{
    /**
     * @param $asd string text message
     * @return mixed result
     */
    public function getAll()
    {
        return $this->db->select("SELECT * FROM roles");
    }

}

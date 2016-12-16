<?php namespace Application\Models;

use Modules\Database\Core\Model;

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

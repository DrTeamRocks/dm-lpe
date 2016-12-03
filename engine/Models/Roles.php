<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Roles
 * @package Application\Models
 */
class Roles extends Model
{
    /**
     * Get user by id
     *
     * @return array
     */
    public function getAll()
    {
        return $this->db->select("SELECT * FROM roles");
    }

}

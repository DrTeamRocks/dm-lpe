<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Sections
 * @package Application\Models
 */
class Sections extends Model
{
    /**
     * Get section by ID
     *
     * @param $id
     * @return mixed
     */
    public function getSection($id)
    {
        return $this->db->query("SELECT * FROM sections WHERE id='$id'");
    }

    /**
     * Update existed section
     *
     * @param $data
     * @param $where
     * @return mixed
     */
    public function update($data, $where)
    {
        return $this->db->update('sections', $data, $where);
    }

    /**
     * Insert new section
     *
     * @param $data
     * @return mixed
     */
    public function insert($data)
    {
        return $this->db->insert('sections', $data);
    }
}

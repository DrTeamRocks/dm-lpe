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
        return $this->db->query("
            SELECT *
            FROM sections
            WHERE
                deleted = FALSE
                AND id = '$id'
        ");
    }

    /**
     * Get all section for view
     *
     * @return mixed
     */
    public function getSections()
    {
        return $this->db->query("
            SELECT *
            FROM sections
            WHERE
                deleted = FALSE
                AND enabled = TRUE
                AND draft = FALSE
            ORDER BY
                ordering
        ");
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

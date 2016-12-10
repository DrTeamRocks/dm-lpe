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
        return $this->db->select("
            SELECT *
            FROM sections
            WHERE
                deleted = FALSE
                AND id = :id
        ",
            array(
                ':id' => $id
            )
        );
    }

    /**
     * Get all section for view
     *
     * @param $id_site
     * @return mixed
     */
    public function getSections($id_site)
    {
        return $this->db->select("
            SELECT *
            FROM sections
            WHERE
                deleted = FALSE
                AND id_site = :id_site
            ORDER BY
                ordering
        ", array(':id_site' => $id_site));
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

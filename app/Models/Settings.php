<?php namespace DrMVC\App\Models;

use DrMVC\Database\Model;

/**
 * Class Settings
 * @package Application\Models
 */
class Settings extends Model
{
    /**
     * Get all settings for specified site
     *
     * @param $id_site
     * @return null
     */
    public function getSettings($id_site)
    {
        $result = $this->db->select(
            "SELECT * FROM settings WHERE id_site = :id_site",
            array(':id_site' => $id_site)
        );

        $return = null;
        foreach ($result as $key => $value) {
            $return[$value->key] = $value->value;
        }

        return $return;
    }

    /**
     * Update data in table
     *
     * @param $data
     * @param $where
     * @return mixed
     */
    function update($data, $where)
    {
        return $this->db->update("settings", $data, $where);
    }

    /**
     * Insert data in table
     *
     * @param $data
     * @return mixed
     */
    function insert($data)
    {
        echo 'insert';
        return $this->db->insert("settings", $data);
    }
}

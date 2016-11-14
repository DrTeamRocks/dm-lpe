<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Settings
 * @package Application\Models
 */
class Settings extends Model
{
    /**
     * Get some parameters by key
     *
     * @param $key
     * @return mixed
     */
    public function getByKey($key)
    {
        return $this->db->select("SELECT * FROM settings WHERE `key` = '$key'");
    }

    /**
     * Get all settings
     *
     * @return array
     */
    public function getAll()
    {
        $return = null;
        $result = $this->db->select("SELECT * FROM settings");
        //print_r($result);die();
        foreach ($result as $key => $value) {
            $return[$value->key] = $value->value;
        }
        //print_r($return);
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

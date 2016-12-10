<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Sites
 * @package Application\Models
 */
class Sites extends Model
{

    public function getAll()
    {
        $result = $this->db->select("SELECT * FROM sites");
        return $result;
    }

    /**
     * Get site by mode and value
     *
     * @param $mode
     * @param $value
     * @return null
     */
    public function getSite($mode, $value)
    {
        switch ($mode) {
            case 'id':
                $result = $this->db->select(
                    "SELECT * FROM sites WHERE id = :id",
                    array(':id' => $value)
                );
                break;
            default:
                $result = array();
        }

        return $result['0'];
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
        return $this->db->update("users", $data, $where);
    }

    /**
     * Insert data in table
     *
     * @param $data
     * @return mixed
     */
    function insert($data)
    {
        return $this->db->insert("users", $data);
    }
}

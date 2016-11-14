<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Users
 * @package Application\Models
 */
class Users extends Model
{
    /**
     * Get user by id
     *
     * @param $value
     * @param $type
     * @return array
     */
    public function getUser($value, $type = null)
    {
        switch (true) {
            // Default mode
            case ($type == null):
                $where = "AND `id` = '$value'";
                break;
            // If need get user by email
            case ($type == 'email'):
                $where = "AND `email` = '$value'";
                break;
            // If need get user by username
            case ($type == 'username'):
                $where = "AND `username` = '$value'";
                break;
        }

        $result = $this->db->select("
            SELECT *
            FROM users
            WHERE
                `deleted` = FALSE
                $where
        ");

        return $result['0'];
    }

    /**
     * Get user hash by username
     *
     * @param $username
     * @return array
     */
    public function getHash($username)
    {
        $result = $this->db->select("
            SELECT password
            FROM users
            WHERE
                `username` = '$username'
                AND `deleted` = FALSE
        ");

        return $result['0']->password;
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

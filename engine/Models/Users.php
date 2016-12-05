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
                $where = "AND u.id = :id";
                $where_array = array(':id' => $value);
                break;
            // If need get user by email
            case ($type == 'email'):
                $where = "AND u.email = :email";
                $where_array = array(':email' => $value);
                break;
            // If need get user by username
            case ($type == 'username'):
                $where = "AND u.username = :username";
                $where_array = array(':username' => $value);
                break;
        }

        $result = $this->db->select("
            SELECT u.*, r.*
            FROM users AS u
            LEFT JOIN roles AS r ON (r.id = u.id_role)
            WHERE
                u.deleted = FALSE
                $where
        ", $where_array);

        return $result['0'];
    }

    /**
     * Get all users from database
     *
     * @return mixed
     */
    public function getAll()
    {
        $result = $this->db->select("
            SELECT u.*, r.*
            FROM users AS u
            LEFT JOIN roles AS r ON (r.id = u.id_role)
            WHERE
                u.deleted = FALSE
        ");

        return $result;
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
                deleted = FALSE
                AND username = :username
        ",
            array(
                ':username' => $username
            )
        );

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

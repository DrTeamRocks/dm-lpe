<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Tokens
 * @package Application\Models
 */
class Tokens extends Model
{
    public function getUserByToken($token)
    {
        return false;
    }

    public function delete($where)
    {
        return false;
    }

    public function update($data, $where)
    {
        return false;
    }

    public function insert($data)
    {
        return false;
    }
}

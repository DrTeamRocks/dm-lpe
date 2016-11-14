<?php namespace Application\Models;

use Modules\Database\Core\Model;

/**
 * Class Users
 * @package Application\Models
 */
class Users extends Model
{
    public function getUser($value, $mode) {
        switch($mode) {
            case 'email':
                $return = true;
                break;
            default:
                $return = false;
                break;
        }
        return $return;
    }

    public function getHash($value) {
        return false;
    }

    public function update($data, $where) {
        return false;
    }

    public function insert($data) {
        return false;
    }
}

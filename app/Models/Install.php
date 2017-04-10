<?php namespace DrMVC\App\Models;

use DrMVC\Core\Password;
use DrMVC\Database\Model;

/**
 * Class Install
 * @package Application\Models
 */
class Install extends Model
{
    public function table_exist($table)
    {
        $dbname = $this->_config['database'];

        $test = $this->db->select("
            SELECT count(*) as test
            FROM information_schema.tables
            WHERE
                table_schema = '$dbname'
                AND table_name = '$table';
        ");

        // Test if model exist
        if ($test['0']->test == '1') $result = true; else $result = false;

        return $result;
    }

    public function create_users()
    {
        $this->db->exec("
            CREATE TABLE `users` (
                `id`             INT  NOT NULL AUTO_INCREMENT,
                `id_role`        INT  NOT NULL,
                `email`          TEXT NOT NULL,
                `username`       TEXT NOT NULL,
                `password`       TEXT NOT NULL,
                `create_time`    TEXT NOT NULL,
                `lastlogin_time` TEXT NOT NULL,
                `enabled`        BOOL NOT NULL DEFAULT TRUE,
                `deleted`        BOOL NOT NULL DEFAULT FALSE,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $admin_pass = Password::make('admin');
        $user_pass = Password::make('editor');
        $editor_pass = Password::make('user');
        $time = date('Y-m-d H:i:s');

        $this->db->exec("
            INSERT INTO `users` (`id_role`,`username`,`email`,`password`,`create_time`) VALUES ('1', 'admin', 'admin@email.com', '$admin_pass', '$time');
            INSERT INTO `users` (`id_role`,`username`,`email`,`password`,`create_time`) VALUES ('2', 'editor', 'editor@email.com', '$editor_pass', '$time');
            INSERT INTO `users` (`id_role`,`username`,`email`,`password`,`create_time`) VALUES ('3', 'user', 'user@email.com', '$user_pass', '$time');
        ");

        return true;
    }

    public function create_roles()
    {
        $this->db->exec("
            CREATE TABLE `roles` (
                `id`        INT  NOT NULL,
                `name`      TEXT,
                `is_admin`  BOOL NOT NULL DEFAULT FALSE,
                `is_editor` BOOL NOT NULL DEFAULT FALSE,
                `is_user`   BOOL NOT NULL DEFAULT FALSE,
                PRIMARY KEY (`id`)
            );
        ");

        $this->db->exec("
            INSERT INTO `roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('1', 'Admin', TRUE, TRUE, TRUE);
            INSERT INTO `roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('2', 'Editor', FALSE, TRUE, TRUE);
            INSERT INTO `roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('3', 'User', FALSE, FALSE, TRUE);
        ");

        return true;
    }

    public function create_sites()
    {
        $this->db->exec("
            CREATE TABLE `sites` (
                `id`      INT  NOT NULL AUTO_INCREMENT,
                `url`     TEXT NOT NULL,
                `alias`   TEXT NOT NULL,
                `enabled` BOOL NOT NULL DEFAULT TRUE,
                `deleted` BOOL NOT NULL DEFAULT FALSE,
                PRIMARY KEY (`id`)
            );
        ");

        $this->db->exec("
            INSERT INTO `sites` (`url`, `alias`) VALUES ('dm.drteam.rocks', 'dm');
        ");

        return true;
    }

    public function create_settings()
    {
        $this->db->exec("
            CREATE TABLE `settings` (
                `id`      INT  NOT NULL AUTO_INCREMENT,
                `id_site` INT  NOT NULL,
                `key`     TEXT NOT NULL,
                `value`   TEXT NOT NULL,
                PRIMARY KEY (`id`)
            );
        ");

        $this->db->exec("
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'title', 'title');
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'styles', 'styles');
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'scripts', 'scripts');
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'description', 'description');
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'keywords', 'keywords');
            INSERT INTO `settings` (`id_site`, `key`, `value`) VALUES ('1', 'author', 'author');
        ");

        return true;
    }

    public function create_sections()
    {
        $this->db->exec("
            CREATE TABLE `sections` (
                id            INT  NOT NULL AUTO_INCREMENT,
                id_site       INT  NOT NULL,
                add_time      TEXT NOT NULL,
                title         TEXT,
                section_id    TEXT,
                section_class TEXT,
                content       TEXT,
                variables     TEXT,
                ordering      INT,
                draft         BOOL NOT NULL DEFAULT TRUE,
                enabled       BOOL NOT NULL DEFAULT TRUE,
                deleted       BOOL NOT NULL DEFAULT FALSE,
                PRIMARY KEY (id)
            );
        ");

        return true;
    }

}

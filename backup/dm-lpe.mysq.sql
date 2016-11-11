CREATE DATABASE `dm`;
CREATE USER `dm_user`@`%` IDENTIFIED BY 'dm_pass';
GRANT ALL PRIVILEGES ON `dm`.* TO 'dm_user'@'%' WITH GRANT OPTION;

CREATE TABLE `dm`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` text NOT NULL,
    `username` text NOT NULL,
    `password` text NOT NULL,
    `lastlogin_time` text NOT NULL,
    `enabled` bool NOT NULL DEFAULT TRUE,
    `deleted` bool NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `dm`.`tokens` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_user` INT NOT NULL,
    `hash` text NOT NULL,
    `add_time` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `dm`.`sections` (
    id INT NOT NULL AUTO_INCREMENT,
    add_time text NOT NULL,
    content text,
    variables text,
    ordering INT NOT NULL,
    draft bool NOT NULL DEFAULT TRUE,
    enabled bool NOT NULL DEFAULT TRUE,
    deleted bool NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

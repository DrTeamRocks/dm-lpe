CREATE DATABASE `dm`;
CREATE USER `dm_user`@`%`
  IDENTIFIED BY 'dm_pass';
GRANT ALL PRIVILEGES ON `dm`.* TO 'dm_user'@'%'
WITH GRANT OPTION;

-- System users
CREATE TABLE `dm`.`users` (
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
);
INSERT INTO `dm`.`users` (`id_role`, `email`, `username`, `password`, `lastlogin_time`) VALUES
  ('1', 'admin@email.com', 'admin', '$2y$10$Fi/TVnQzwsOJe3EoEDpMi.SnP147C4EWM5GLmc8mrhxrGDH2DabuG',
   '2016-11-15 00:22:00');
INSERT INTO `dm`.`users` (`id_role`, `email`, `username`, `password`, `lastlogin_time`) VALUES
  ('2', 'editor@email.com', 'editor', '$2y$10$2KRRT7KU9iYISU2qpc47JeEo6xz96CPTcMsEXcTo0p9GxNbLVusQG',
   '2016-11-15 00:22:00');
INSERT INTO `dm`.`users` (`id_role`, `email`, `username`, `password`, `lastlogin_time`) VALUES
  ('3', 'user@email.com', 'user', '$2y$10$QHYxT7OScoOr3Az2pqkrueyXK/QDK5XDjVchXlA9.nkgGm8Poe.xe',
   '2016-11-15 00:22:00');

-- System roles
CREATE TABLE `dm`.`roles` (
  `id`        INT  NOT NULL,
  `name`      TEXT,
  `is_admin`  BOOL NOT NULL DEFAULT FALSE,
  `is_editor` BOOL NOT NULL DEFAULT FALSE,
  `is_user`   BOOL NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id`)
);
INSERT INTO `dm`.`roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('1', 'Admin', TRUE, TRUE, TRUE);
INSERT INTO `dm`.`roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('2', 'Editor', FALSE, TRUE, TRUE);
INSERT INTO `dm`.`roles` (`id`, `name`, `is_admin`, `is_editor`, `is_user`) VALUES ('3', 'User', FALSE, FALSE, TRUE);

-- Sites
CREATE TABLE `dm`.`sites` (
  `id`      INT  NOT NULL AUTO_INCREMENT,
  `url`     TEXT NOT NULL,
  `alias`   TEXT NOT NULL,
  `enabled` BOOL NOT NULL DEFAULT TRUE,
  `deleted` BOOL NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id`)
);
INSERT INTO `dm`.`sites` (`url`, `alias`) VALUES ('dm.drteam.rocks', 'dm');

-- Sites settings
CREATE TABLE `dm`.`settings` (
  `id`      INT  NOT NULL AUTO_INCREMENT,
  `id_site` INT  NOT NULL,
  `key`     TEXT NOT NULL,
  `value`   TEXT NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'title', 'title');
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'styles', 'styles');
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'scripts', 'scripts');
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'description', 'description');
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'keywords', 'keywords');
INSERT INTO `dm`.`settings` (`id_site`, `key`, `value`) VALUES ('1', 'author', 'author');

-- Sites section
CREATE TABLE `dm`.`sections` (
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

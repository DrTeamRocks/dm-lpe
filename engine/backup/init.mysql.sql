#CREATE DATABASE `dm`;
#CREATE USER `dm_user`@`%`
#  IDENTIFIED BY 'dm_pass';
#GRANT ALL PRIVILEGES ON `dm`.* TO 'dm_user'@'%'
#WITH GRANT OPTION;

CREATE TABLE `dm`.`users` (
  `id`             INT  NOT NULL AUTO_INCREMENT,
  `email`          TEXT NOT NULL,
  `username`       TEXT NOT NULL,
  `password`       TEXT NOT NULL,
  `lastlogin_time` TEXT NOT NULL,
  `enabled`        BOOL NOT NULL DEFAULT TRUE,
  `deleted`        BOOL NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id`)
);
INSERT INTO `dm`.`users` (`email`, `username`, `password`, `lastlogin_time`) VALUES
  ('admin@email.com', 'admin', '$2y$10$Fi/TVnQzwsOJe3EoEDpMi.SnP147C4EWM5GLmc8mrhxrGDH2DabuG', '2016-11-15 00:22:00');

CREATE TABLE `dm`.`settings` (
  `id`    INT  NOT NULL AUTO_INCREMENT,
  `key`   TEXT NOT NULL,
  `value` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('title', 'title');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('styles', 'styles');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('scripts', 'scripts');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('description', 'description');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('keywords', 'keywords');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('author', 'author');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('top', 'top');
INSERT INTO `dm`.`settings` (`key`, `value`) VALUES ('bottom', 'bottom');

CREATE TABLE `dm`.`sections` (
  id            INT  NOT NULL AUTO_INCREMENT,
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

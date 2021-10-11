CREATE TABLE `global_options`
(
    `id`    int(11)                                 NOT NULL AUTO_INCREMENT,
    `name`  varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value` varchar(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;


INSERT INTO `global_options` (`id`, `name`, `value`)
VALUES (1, 'club_name', ''),
       (2, 'club_description', ''),
       (3, 'date_format', 'd/m/y'),
       (4, 'time_format', 'G:i'),
       (5, 'allow_registrations', '1'),
       (6, 'super_user_firstname', ''),
       (7, 'super_user_lastname', ''),
       (8, 'super_user_email', '');
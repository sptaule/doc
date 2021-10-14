CREATE TABLE `global_option`
(
    `global_option_id`    int(11)                                 NOT NULL AUTO_INCREMENT,
    `global_option_name`  varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `global_option_value` varchar(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    PRIMARY KEY (`global_option_id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;


INSERT INTO `global_option` (`global_option_id`, `global_option_name`, `global_option_value`)
VALUES (1, 'club_name', ''),
       (2, 'club_description', ''),
       (3, 'date_format', '%d/%m/%y'),
       (4, 'time_format', '%R'),
       (5, 'allow_registrations', '1'),
       (6, 'super_user_firstname', ''),
       (7, 'super_user_lastname', ''),
       (8, 'super_user_email', '');
CREATE TABLE `admins`
(
    `id`       int(11)                                 NOT NULL AUTO_INCREMENT,
    `name`     varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`    varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci

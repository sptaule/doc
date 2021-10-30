CREATE TABLE `event_type`
(
    `id`    int(10) unsigned                       NOT NULL AUTO_INCREMENT,
    `name`  varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `color` char(6) COLLATE utf8mb4_unicode_ci     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
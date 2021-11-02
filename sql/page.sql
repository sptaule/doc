CREATE TABLE `page`
(
    `id`         int(10) UNSIGNED                       NOT NULL AUTO_INCREMENT,
    `name`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `content`    mediumblob                                      DEFAULT NULL,
    `menu_id`    int(10) UNSIGNED                                DEFAULT NULL,
    `deletable`  tinyint(1)                             NOT NULL DEFAULT 1,
    `created_at` datetime                               NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime                               NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `page` (`id`, `name`, `slug`, `content`, `menu_id`, `deletable`)
VALUES (1, 'Accueil', '', NULL, NULL, 0),
       (2, 'Contact', 'contact', NULL, NULL, 0),
       (3, 'Les locaux', 'les-locaux', NULL, 1, 1),
       (4, 'Le matériel', 'le-materiel', NULL, 1, 1);
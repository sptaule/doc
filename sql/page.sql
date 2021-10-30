CREATE TABLE `page`
(
    `id`         int(10) UNSIGNED                       NOT NULL,
    `name`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `content`    mediumblob                                      DEFAULT NULL,
    `menu_id`    int(10) UNSIGNED                                DEFAULT NULL,
    `editable`   tinyint(1)                             NOT NULL DEFAULT 1,
    `created_at` datetime                               NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime                               NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `page` (`id`, `name`, `slug`, `content`, `menu_id`, `deletable`, `created_at`, `updated_at`)
VALUES (1, 'Accueil', '', NULL, NULL, 0, '2021-10-16 12:06:49', '2021-10-26 18:02:46'),
       (2, 'Contact', 'contact', NULL, NULL, 1, '2021-10-16 12:06:49', '2021-10-26 18:02:46'),
       (3, 'Les locaux', 'les-locaux', NULL, NULL, 1, '2021-10-14 12:06:49', '2021-10-28 16:25:10'),
       (4, 'Le matériel', 'le-materiel', NULL, NULL, 1, '2021-10-14 12:06:49', '2021-10-26 12:27:56');
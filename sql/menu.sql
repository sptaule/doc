CREATE TABLE `menu`
(
    `id`         int(10) UNSIGNED                       NOT NULL AUTO_INCREMENT,
    `name`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` datetime                               NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime                               NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `menu` (`id`, `name`, `slug`)
VALUES (1, 'Le club', 'le-club');
CREATE TABLE `menu`
(
    `id`         int(10) UNSIGNED                       NOT NULL,
    `name`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`       varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` int(11)                                NOT NULL DEFAULT current_timestamp(),
    `updated_at` int(11)                                NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
CREATE TABLE `event_type_rank`
(
    `id`            int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `event_type_id` int(10) UNSIGNED NOT NULL,
    `rank_id`       int(10) UNSIGNED NOT NULL,
    `value`         int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `event_type_rank` (`id`, `event_type_id`, `rank_id`, `value`)
VALUES (1, 1, 1, 1),
       (2, 1, 2, 1),
       (3, 1, 3, 1),
       (4, 2, 1, 1),
       (5, 2, 2, 1),
       (6, 2, 3, 1),
       (7, 3, 1, 1),
       (8, 3, 2, 1),
       (9, 3, 3, 1),
       (10, 4, 1, 1),
       (11, 4, 2, 1),
       (12, 4, 3, 1),
       (13, 5, 1, 0),
       (14, 5, 2, 1),
       (15, 5, 3, 1);
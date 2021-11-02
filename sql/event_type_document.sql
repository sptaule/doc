CREATE TABLE `event_type_document`
(
    `id`            int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `event_type_id` int(10) UNSIGNED NOT NULL,
    `document_id`   int(10) UNSIGNED NOT NULL,
    `value`         int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `event_type_document` (`id`, `event_type_id`, `document_id`, `value`)
VALUES (1, 1, 3, 1),
       (2, 1, 1, 1),
       (3, 1, 2, 1),
       (4, 2, 3, 1),
       (5, 2, 1, 1),
       (6, 2, 2, 1),
       (7, 3, 3, 1),
       (8, 3, 1, 1),
       (9, 3, 2, 1),
       (10, 4, 3, 1),
       (11, 4, 1, 0),
       (12, 4, 2, 0),
       (13, 5, 3, 1),
       (14, 5, 1, 0),
       (15, 5, 2, 0);
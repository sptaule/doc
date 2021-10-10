CREATE TABLE `diving_level`
(
    `id`          int(11)                                 NOT NULL AUTO_INCREMENT,
    `name`        varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `position`    int(10) unsigned                        NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `diving_level` (`id`, `name`, `description`, `position`)
VALUES (1, 'Débutant', '', 1),
       (2, 'Plongeur de bronze', '', 2),
       (3, 'Plongeur d\'argent', '', 3),
       (4, 'Plongeur d\'or', '', 4),
       (5, 'PE 12', '', 5),
       (6, 'Niveau 1', '', 6),
       (7, 'PA 20', '', 7),
       (8, 'PE 40', '', 8),
       (9, 'Niveau 2', '', 9),
       (10, 'Niveau 2 - E1', '', 10),
       (11, 'PA 40', '', 11),
       (12, 'PE 60', '', 12),
       (13, 'Niveau 3', '', 13),
       (14, 'Niveau 3 - E1', '', 14),
       (15, 'Niveau 4', '', 15),
       (16, 'P5', '', 16),
       (17, 'E2', '', 17),
       (18, 'E2 / P5', '', 18),
       (19, 'E3 - MF1', '', 19),
       (20, 'E4 - MF2', '', 20);
CREATE TABLE `rank`
(
    `rank_id`    int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `rank_name`  varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `rank_color` char(6) COLLATE utf8mb4_unicode_ci      NOT NULL,
    PRIMARY KEY (`rank_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `rank` (`rank_id`, `rank_name`, `rank_color`)
VALUES (1, 'Membre', '309140'),
       (2, 'Directeur de plongée', '2D66C3'),
       (3, 'Administrateur', 'E1740B');
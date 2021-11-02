CREATE TABLE `event_type`
(
    `id`    int(10) UNSIGNED                       NOT NULL AUTO_INCREMENT,
    `name`  varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `color` char(6) COLLATE utf8mb4_unicode_ci     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `event_type` (`id`, `name`, `color`, `charge`)
VALUES (1, 'Plongée', '2067F3', 1),
       (2, 'Plongée de nuit', '310DBF', 1),
       (3, 'Plongée extérieure', '0FC5D2', 1),
       (4, 'Repas', 'E54F2A', 0),
       (5, 'Assemblée générale', 'D0C162', 0);
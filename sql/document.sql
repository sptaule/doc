CREATE TABLE `document`
(
    `id`          int(10) UNSIGNED                       NOT NULL AUTO_INCREMENT,
    `name`        varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`        varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` varchar(255) COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `approval`    tinyint(1)                             NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `document` (`id`, `name`, `slug`, `description`, `approval`)
VALUES (1, 'CACI', 'caci',
        'Certificat médical d’Absence de Contre-Indication à la pratique des activités subaquatiques', 1),
       (2, 'Licence', 'licence', 'Licence de plongée FFESSM', 1),
       (3, 'Adhésion au club', 'adhesion-au-club', 'Une attestation d\'attachement et de soutien envers le club', 0);
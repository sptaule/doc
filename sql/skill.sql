CREATE TABLE `skills`
(
    `id`   int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `skill` (`id`, `name`, `slug`)
VALUES (1, 'Plongeur Bio 1', 'plongeur-bio-1'),
       (2, 'Plongeur Bio 2', 'plongeur-bio-2'),
       (3, 'Formateur Bio', 'formateur-bio'),
       (4, 'Plongeur Photographe 1', 'plongeur-photographe-1'),
       (5, 'Plongeur Photographe 2', 'plongeur-photographe-2'),
       (6, 'Nitrox Élémentaire', 'nitrox-elementaire'),
       (7, 'Nitrox Confirmé', 'nitrox-confirme'),
       (8, 'Trimix Normoxique', 'trimix-normoxique'),
       (9, 'Trimix Hypoxique', 'trimix-hypoxique'),
       (10, 'Recycleur', 'recycleur'),
       (11, 'Encadrant handisport (EH1)', 'encadrant-handisport-eh1'),
       (12, 'Encadrant handisport (EH2)', 'encadrant-handisport-eh2');
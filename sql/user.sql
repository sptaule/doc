CREATE TABLE `user`
(
    `id`              int(11) unsigned                                  NOT NULL AUTO_INCREMENT,
    `lastname`        varchar(128) COLLATE utf8mb4_unicode_ci           NOT NULL,
    `firstname`       varchar(128) COLLATE utf8mb4_unicode_ci           NOT NULL,
    `genre`           enum ('Homme','Femme') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Homme',
    `birthdate`       date                                              NOT NULL,
    `email`           varchar(128) COLLATE utf8mb4_unicode_ci           NOT NULL,
    `phone`           varchar(10) COLLATE utf8mb4_unicode_ci            NOT NULL,
    `password`        varchar(255) COLLATE utf8mb4_unicode_ci           NOT NULL,
    `rank_id`         int(10) unsigned                                  NOT NULL,
    `diving_level_id` int(10) unsigned                                  NOT NULL,
    `skillset_id`     int(10) unsigned                                  NOT NULL,
    `last_connection` timestamp                                         NOT NULL DEFAULT current_timestamp(),
    `created_at`      timestamp                                         NOT NULL DEFAULT current_timestamp(),
    `updated_at`      datetime                                          NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `rank_id` (`rank_id`),
    KEY `diving_level_id` (`diving_level_id`),
    KEY `skillset_id` (`skillset_id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
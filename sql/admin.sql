CREATE TABLE `admin`
(
    `id`       int(11)                                 NOT NULL AUTO_INCREMENT,
    `name`     varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`    varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `admin` (`id`, `name`, `email`, `password`)
VALUES (1, 'Lucas', 'lecas83@gmail.com', '$2y$10$8GzOB8itA7ynY6rtWYCMOOI4agxg4r6hb704fc9JMKDTXO2fp0zV6');
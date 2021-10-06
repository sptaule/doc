![Alt text](documentation/static/img/logo-full.png?raw=true "Scuba logo")

# Documentation pour Scuba

Solution de gestion pour les clubs de plongée sous-marine.

## Table `rank`

| Champ  | Type           | Valeur par défaut |
| ------ | -------------- | ----------------- |
| `id`   | `int UNSIGNED` |                   |
| `name` | `varchar 128`  |                   |

## Table `user`

| Champ            | Type              | Valeur par défaut   |
| ---------------- | ----------------- | ------------------- |
| `id`             | `int UNSIGNED AI` |                     |
| `type_id`        | `int UNSIGNED`    |                     |
| `name`           | `varchar 128`     | `NULL`              |
| `e_date`         | `date`            |                     |
| `e_time`         | `time`            |                     |
| `location`       | `varchar 128`     |                     |
| `required_level` | `int`             | `NULL`              |
| `max_people`     | `int`             | `NULL`              |
| `content`        | `blob`            | `NULL`              |
| `user_id`        | `int`             |                     |
| `created_at`     | `datetime`        | `current_timestamp` |
| `updated_at`     | `datetime`        | `current_timestamp` |

## Table `album`

| Champ        | Type                                | Valeur par défaut   |
| ------------ | ----------------------------------- | ------------------- |
| `id`         | `int UNSIGNED AI`                   |                     |
| `user_id`    | `int UNSIGNED`                      |                     |
| `name`       | `varchar 128`                       |                     |
| `visibility` | `enum("all", "restricted", "self")` |                     |
| `created_at` | `datetime`                          | `current_timestamp` |
| `updated_at` | `datetime`                          | `current_timestamp` |

## Table `photo`

| Champ        | Type              | Valeur par défaut   |
| ------------ | ----------------- | ------------------- |
| `id`         | `int UNSIGNED AI` |                     |
| `album_id`   | `int UNSIGNED`    |                     |
| `name`       | `varchar 128`     | `NULL`              |
| `created_at` | `datetime`        | `current_timestamp` |
| `updated_at` | `datetime`        | `current_timestamp` |

## Table `caci`

| Champ        | Type              | Valeur par défaut   |
| ------------ | ----------------- | ------------------- |
| `id`         | `int UNSIGNED AI` |                     |
| `user_id`    | `int UNSIGNED`    |                     |
| `enactment`  | `date`            |                     |
| `due`        | `date`            |                     |
| `approved`   | `bool`            | `FALSE`             |
| `created_at` | `datetime`        | `current_timestamp` |
| `updated_at` | `datetime`        | `current_timestamp` |

## Table `licence`

| Champ          | Type              | Valeur par défaut   |
| -------------- | ----------------- | ------------------- |
| `id`           | `int UNSIGNED AI` |                     |
| `user_id`      | `int UNSIGNED`    |                     |
| `number`       | `varchar 16`      |                     |
| `insurance_id` | `INT UNSIGNED`    | `0`                 |
| `approved`     | `bool`            | `FALSE`             |
| `created_at`   | `datetime`        | `current_timestamp` |
| `updated_at`   | `datetime`        | `current_timestamp` |

## Table `membership`

| Champ        | Type              | Valeur par défaut   |
| ------------ | ----------------- | ------------------- |
| `id`         | `int UNSIGNED AI` |                     |
| `user_id`    | `int UNSIGNED`    |                     |
| `enactment`  | `date`            |                     |
| `due`        | `date`            |                     |
| `created_at` | `datetime`        | `current_timestamp` |
| `updated_at` | `datetime`        | `current_timestamp` |
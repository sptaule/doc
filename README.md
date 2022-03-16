![](documentation/static/img/logo-full.png)

<p>Old project, not completed.</p>

<p>The project was to create a CRM with complete front and back.<br>
Manage users, registrations, events, diving families (children), social network and inner messaging, account point system with reload (integrated payment system) and much more...
</p>

<p style="text-align: center;">Solution de gestion pour les clubs de plongée sous-marine.</p>

## Table `rank`

(static)
Tous les grades disponibles.

| Champ   | Type           | Valeur par défaut |
| ------- | -------------- | ----------------- |
| `id`    | `int UNSIGNED` |                   |
| `name`  | `varchar 128`  |                   |
| `color` | `varchar 9`    |                   |

## Table `user`

Liste des utilisateurs inscrits.

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

## Table `event`

Liste des évènements.

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
| `author_id`      | `int`             |                     |
| `created_at`     | `datetime`        | `current_timestamp` |
| `updated_at`     | `datetime`        | `current_timestamp` |

## Table `album`

Liste de tous les albums.

| Champ        | Type                                | Valeur par défaut   |
| ------------ | ----------------------------------- | ------------------- |
| `id`         | `int UNSIGNED AI`                   |                     |
| `user_id`    | `int UNSIGNED`                      |                     |
| `name`       | `varchar 128`                       |                     |
| `visibility` | `enum("all", "restricted", "self")` |                     |
| `created_at` | `datetime`                          | `current_timestamp` |
| `updated_at` | `datetime`                          | `current_timestamp` |

## Table `photo`

Liste de toutes les photos.

| Champ        | Type              | Valeur par défaut   |
| ------------ | ----------------- | ------------------- |
| `id`         | `int UNSIGNED AI` |                     |
| `album_id`   | `int UNSIGNED`    |                     |
| `name`       | `varchar 128`     | `NULL`              |
| `created_at` | `datetime`        | `current_timestamp` |
| `updated_at` | `datetime`        | `current_timestamp` |

## Table `caci`

Liste des CACI (utilisateurs + enfants bulle).

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

Liste des licences FFESSM (utilisateurs + enfants bulle).

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

Liste des adhésions au club (utilisateurs + enfants bulle).

| Champ        | Type              | Valeur par défaut   |
| ------------ | ----------------- | ------------------- |
| `id`         | `int UNSIGNED AI` |                     |
| `user_id`    | `int UNSIGNED`    |                     |
| `enactment`  | `date`            |                     |
| `due`        | `date`            |                     |
| `created_at` | `datetime`        | `current_timestamp` |
| `updated_at` | `datetime`        | `current_timestamp` |

## Table `bubble_user`

Enfants sous la responsabilité de leurs parents.

| Champ             | Type              | Valeur par défaut   |
| ----------------- | ----------------- | ------------------- |
| `id`              | `int UNSIGNED AI` |                     |
| `user_id`         | `int UNSIGNED`    |                     |
| `genre`           | `int UNSIGNED`    |                     |
| `birthdate`       | `date`            |                     |
| `diving_level_id` | `int UNSIGNED`    |                     |
| `created_at`      | `datetime`        | `current_timestamp` |
| `updated_at`      | `datetime`        | `current_timestamp` |

## Table `bubble_user_documents`

Documents joints des enfants sous la responsabilité de leurs parents.

| Champ            | Type              | Valeur par défaut   |
| ---------------- | ----------------- | ------------------- |
| `id`             | `int UNSIGNED AI` |                     |
| `bubble_user_id` | `int UNSIGNED`    |                     |
| `caci_id`        | `int UNSIGNED`    |                     |
| `licence_id`     | `int UNSIGNED`    |                     |
| `membership_id`  | `int UNSIGNED`    |                     |
| `created_at`     | `datetime`        | `current_timestamp` |
| `updated_at`     | `datetime`        | `current_timestamp` |

## Table `document`

(static)
Liste des documents existants (caci, licence, adhésion, etc...)

| Champ         | Type              | Valeur par défaut   |
| ------------- | ----------------- | ------------------- |
| `id`          | `int UNSIGNED AI` |                     |
| `name`        | `varchar 64`      |                     |
| `description` | `varchar 255`     | `NULL`              |

## Table `type_rank`

Grades autorisés à participer à tel ou tel évènement.

| Champ     | Type              | Valeur par défaut |
| --------- | ----------------- | ----------------- |
| `id`      | `int UNSIGNED AI` |                   |
| `type_id` | `int UNSIGNED`    | `NULL`            |
| `rank_id` | `int UNSIGNED`    | `NULL`            |
| `value`   | `bool`            |                   |

## Table `type_document`

Documents nécessaires pour participer à tel ou tel évènement.

| Champ         | Type              | Valeur par défaut |
| ------------- | ----------------- | ----------------- |
| `id`          | `int UNSIGNED AI` |                   |
| `type_id`     | `int UNSIGNED`    | `NULL`            |
| `document_id` | `int UNSIGNED`    | `NULL`            |
| `value`       | `bool`            |                   |

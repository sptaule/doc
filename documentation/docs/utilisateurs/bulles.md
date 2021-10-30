---
sidebar_position: 4
---

# Les bulles

## La notion de bulle

La **bulle** permet aux utilisateurs de pouvoir ajouter des _"utilisateurs à charge"_.<br/>
Cette fonction a été conçue avant tout pour permettre de gérer les **enfants mineurs à charge**, pour éviter de devoir
créer un compte pour chaque enfant.

Concrètement il pourra :<br/>

- Modifier les informations de ses enfants<br/>
  `Nom, prénom, genre, date de naissance, niveau de plongée`...
- Gérer leurs documents requis (CACI, adhésion, licence)<br/>
- Les inscrire aux différents évènements

## Table `bubble_user`

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

| Champ            | Type              | Valeur par défaut   |
| ---------------- | ----------------- | ------------------- |
| `id`             | `int UNSIGNED AI` |                     |
| `bubble_user_id` | `int UNSIGNED`    |                     |
| `caci_id`        | `int UNSIGNED`    |                     |
| `licence_id`     | `int UNSIGNED`    |                     |
| `membership_id`  | `int UNSIGNED`    |                     |
| `created_at`     | `datetime`        | `current_timestamp` |
| `updated_at`     | `datetime`        | `current_timestamp` |
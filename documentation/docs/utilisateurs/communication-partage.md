---
sidebar_position: 5
---

# Communication et partage

Les utilisateurs, une fois connectés au site, peuvent intéragir entre eux.

## Messagerie

Les utilisateurs ont la possibilité de s'envoyer des **messages privés**.

## Albums photos

Les utilisateurs ont la possibilité de créer des **albums photos**.

Ces albums photos peuvent être partagés soit :
- à **tout le monde**, y compris les non-membres
- aux **autres utilisateurs** du site
- en **privé** (vous seul avez la visibilité)

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
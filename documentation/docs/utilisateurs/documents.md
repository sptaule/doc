---
sidebar_position: 7
---

# Documents requis

Plusieurs documents sont requis pour pouvoir s'inscrire aux [différents évènements](/evenements/types.md#documents-requis).

## CACI

_Voir plus d'informations sur [le site de la FFESSM](https://ffessm.fr/pratiquer/le-certificat-medical)_.

### Ajouter mon CACI

L'utilisateur doit ajouter son CACI et ce dernier devra être validé par un administrateur.<br/>
Tant qu'il n'a pas été validé, le détenteur ne pourra pas s'inscrire aux évènements nécessitant un CACI valide.

### Remplacer mon CACI

Au bout d'un an, le CACI n'est plus valide et l'utilisateur devra le modifier.<br/>
Il aura la possibilité de le remplacer 15 jours avant sa date d'expiration.

Même principe que pour l'ajout, un administrateur devra valider le nouveau CACI.

## Licence

### Ajouter ma licence

L'utilisateur doit ajouter sa licence et elle devra être validée par un administrateur.<br/>
Tant qu'elle n'a pas été validée, le détenteur ne pourra pas s'inscrire aux évènements nécessitant une licence valide.

### Remplacer ma licence

Au bout d'un an, le CACI n'est plus valide et l'utilisateur devra le modifier.<br/>
Il aura la possibilité de le remplacer 15 jours avant sa date d'expiration.

Même principe que pour l'ajout, un administrateur devra valider le nouveau CACI.

## Adhésion au club

L'utilisateur doit être adhérent au club afin de s'inscrire aux différents évènements.<br/>
L'adhésion est valable un an et doit être renouvellée.

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
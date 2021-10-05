---
sidebar_position: 1
---

# Composition d'un évènement

## Qui peut créer un évènement ?

Un **évènement** peut être créé directement depuis la partie publique du site par :
- un **Administrateur**
- un **Directeur de plongée**

## De quoi est composé un évènement ?

Un **évènement** doit être créé avec les champs suivants :

### Type d'évènement
_À sélectionner parmi la liste des types d'évènements créés._

### Nom
<span class='grayed'>optionnel</span>

_Un nom qui apparaitra sur la fiche de l'évènement._

### Date
_La date à laquelle l'évènement aura lieu._

### Heure
_L'heure à laquelle l'évènement aura lieu._

### Site de plongée
_Le site de plongée où l'évènement aura lieu.<br/>À choisir parmi une liste des sites que vous avez créé auparavant ou à rentrer à la main._

### Participants maximum
<span class='grayed'>optionnel</span>

_Le nombre de places disponibles.<br/>Si vous ne renseignez pas ce champ, la valeur maxiumum de places disponibles sur le bateau sera utilisée._

### Description
<span class='grayed'>optionnel</span>

_Si vous souhaitez apporter plus d'informations à l'évènement._

:::tip Bon à savoir
Vous pouvez aussi insérer une image personnalisée lors de la création d'un évènement.<br/>
Une image par défaut sera affichée si vous n'en renseignez pas une vous-même.
:::

## Créer plusieurs dates à la fois

Si vous souhaitez gagner du temps en crééant plusieurs évènements à la fois, c'est possible.<br/>
Il vous suffit de renseigner autant de **dates** et **heures** que d'évènements que vous voulez créer.

Pour se faire, vous devez

## Table `event`

| Champ            | Type              | Valeur par défaut   |
|------------------|-------------------|---------------------|
| `id`             | `int UNSIGNED AI` |                    |
| `type_id`        | `int UNSIGNED`    |                    |
| `name`           | `varchar 128`     | `NULL`                |
| `e_date`         | `date`            |                    |
| `e_time`         | `time`            |                    |
| `location`       | `varchar 128`     |                    |
| `required_level` | `int`             | `NULL`                |
| `max_people`     | `int`             | `NULL`                |
| `content`        | `blob`            | `NULL`                |
| `user_id`        | `int`             |                    |
| `created_at`     | `datetime`        | `current_timestamp`   |
| `updated_at`     | `datetime`        | `current_timestamp`   |
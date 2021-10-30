---
sidebar_position: 2
---

# Types d'évènement

## À quoi correspond un type d'évènement ?

Un **type évènement** doit <u>forcément</u> être attribué à un **évènement**.

_Exemple de types d'évènement_<br/>
`Plongée`, `Plongée de nuit`, `Réunion du comité directeur`, etc...

Un type d'évènement possède nécessairement des paramètres associés qui vous permettront de définir à quoi il correspond.

### Grade minimum nécessaire

Utile pour limiter les inscriptions à un évènement selon le grade de l'utilisateur.

Par exemple, l'évènement de type `Plongée` n'aura pas de restrictions quant au grade.<br/>
Car logiquement, tous les **membres**, **directeurs de plongée** ou **administrateurs** peuvent s'inscrire et participer.

En revanche, on peut facilement imaginer que l'évènement de type `Réunion de comité directeur` pourrait être limité aux **directeurs de plongée** et aux **administrateurs**.

:::info Fonctionnement
_Représentation sous forme de cases à cocher_
<input type="checkbox" checked /> Membres<br/>
<input type="checkbox" checked /> Directeurs de plongée<br/>
<input type="checkbox" checked /> Administrateurs<br/>
:::

### Documents requis

Utile pour rendre des documents nécessaires à l'inscription de l'utilisateur.

Par exemple, l'évènement de type `Plongée` nécessitera que l'utilisateur ait les documents suivants :<br/>
**Adhésion au club**, **CACI**, **licence**, etc...

:::info Fonctionnement
_Représentation sous forme de cases à cocher_
<input type="checkbox" checked /> Adhésion au club<br/>
<input type="checkbox" checked /> CACI<br/>
<input type="checkbox" checked /> Licence<br/>
:::

### Code couleur 

La but du code couleur est uniquement décoratif.

Pour vous y retrouver et différencier les **types d'évènements**, vous pouvez assigner une couleur à chacun.<br/>

export const Highlight = ({children, color}) => (
    <span
        style={{
            backgroundColor: color,
            borderRadius: '2px',
            color: '#fff',
            padding: '0.2rem',
        }}>
        {children}
    </span>
);

Par exemple <Highlight color="#a362ad">Rose</Highlight> | <Highlight color="#1e8c25">Vert</Highlight> | <Highlight color="#c41c30">Rouge</Highlight> | ...

## Créer un type d'évènement

## Modifier un type d'évènement

## Supprimer un type d'évènement

## Table `event_type`

| Champ         | Type              | Valeur par défaut   |
| ------------- | ----------------- | ------------------- |
| `id`          | `int UNSIGNED AI` |                     |
| `description` | `varchar 255`     | `NULL`              |
| `color`       | `varchar 9`       |                     |
| `created_at`  | `datetime`        | `current_timestamp` |
| `updated_at`  | `datetime`        | `NULL`              |

## Table `document`

| Champ         | Type              | Valeur par défaut   |
| ------------- | ----------------- | ------------------- |
| `id`          | `int UNSIGNED AI` |                     |
| `name`        | `varchar 64`      |                     |
| `description` | `varchar 255`     | `NULL`              |
| `created_at`  | `datetime`        | `current_timestamp` |
| `updated_at`  | `datetime`        | `NULL`              |

## Table `type_rank`

| Champ     | Type              | Valeur par défaut |
| --------- | ----------------- | ----------------- |
| `id`      | `int UNSIGNED AI` |                   |
| `type_id` | `int UNSIGNED`    | `NULL`            |
| `rank_id` | `int UNSIGNED`    | `NULL`            |
| `value`   | `bool`            |                   |

## Table `type_document`

| Champ         | Type              | Valeur par défaut |
| ------------- | ----------------- | ----------------- |
| `id`          | `int UNSIGNED AI` |                   |
| `type_id`     | `int UNSIGNED`    | `NULL`            |
| `document_id` | `int UNSIGNED`    | `NULL`            |
| `value`       | `bool`            |                   |
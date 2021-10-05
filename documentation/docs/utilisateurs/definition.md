---
sidebar_position: 1
---

# Définition d'un utilisateur

## Comment est défini un utilisateur ?

Un **utilisateur** est défini par les champs suivants :

### Nom et prénom
### Genre
### Date de naissance
_La date de naissance servira à calculer l'âge de l'utilisateur.<br/>
Un mineur pourrait par exemple être limité à certaines inscriptions.<br/>
L'utilisateur peut, s'il le souhaite, afficher sa date de naissance sur son profil public._
### Adresse email
_L'utilisateur doit forcément rentrer une adresse email valide.<br/>
Ne serait-ce que pour avoir un moyen de le contacter, mais aussi car il devra en premier lieu activer son compte.<br/>
L'utilisateur peut, s'il le souhaite, afficher son email sur son profil public._
### Numéro de téléphone
<span class='grayed'>optionnel</span>

_N'est pas obligatoire mais l'administrateur pourra contacter le membre plus facilement si ce champ est renseigné.<br/>
L'utilisateur peut, s'il le souhaite, afficher son numéro sur son profil public._
### Mot de passe
_À l'inscription, un mot de passe doit être créé pour les futures connexions de l'utilisateur.<br/>
Un minimum de 8 caractères est requis.<br/>
Un bon mot de passe facile à retenir peut être une combinaison de 3 mots du dictionnaire.<br/>
**Exemple** : `SuperPatateRobuste123`_

### Niveau de plongée

_À sélectionner parmi tous les niveaux de plongée existants sur le site.<br/>
Le niveau de plongée sert à limiter les inscriptions à certaines plongées.<br/>
**Exemple** : un `plongeur de bronze` ne pourra pas s'inscrire à une plongée nécessitant d'être minimum `E4 - MF1`_

### Formation et compétences

_À sélectionner parmi les formations et compétences existantes sur le site.<br/>
**Exemple** : `Plongeur Photographe 1`, `Plongeur Photographe 2`, `Nitrox Confirmé`, `Encadrant handisport (EH2)`_

## Table `user`

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
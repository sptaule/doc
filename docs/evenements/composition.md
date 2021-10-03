---
sidebar_position: 1
---

# Composition d'un évènement

Un **évènement** peut être créé directement depuis la partie publique du site par
- un **Administrateur**
- un **Directeur de plongée**

<details>
    <summary>Données d'un <code>évènement</code></summary>

    | Nom                  | Champ          | Type            | Valeur par défaut   |
    |----------------------|----------------|-----------------|---------------------|
    | Identifiant          | id             | int UNSIGNED AI | -                   |
    | Type                 | type_id        | int UNSIGNED    | -                   |
    | Nom                  | name           | varchar 128     | NULL                |
    | Date                 | e_date         | date            | -                   |
    | Heure                | e_time         | time            | -                   |
    | Site de plongée      | location       | varchar 128     | -                   |
    | Niveau requis        | required_level | int             | NULL                |
    | Participants maximum | max_people     | int             | NULL                |
    | Contenu              | content        | blob            | NULL                |
    | Créateur             | user_id        | int             | -                   |
    | Date de création     | created_at     | datetime        | current_timestamp   |
    | Date de modification | updated_at     | datetime        | NULL                |
</details>

## Create your first React Page

Create a file at `src/pages/my-react-page.js`:

```php title="src/pages/my-react-page.js"
/**
 * Import a library from "libs" folder
 * @param string $lib
 */
function import(string $lib)
{
    require_once (__DIR__ . "/libs/{$lib}.php");
}
```

![](.composition_images/0c52f526.jpeg)

A new page is now available at `http://localhost:3000/my-react-page`.

## Create your first Markdown Page

Create a file at `src/pages/my-markdown-page.md`:

```mdx title="src/pages/my-markdown-page.md"
# My Markdown page

This is a Markdown page
```

A new page is now available at `http://localhost:3000/my-markdown-page`.

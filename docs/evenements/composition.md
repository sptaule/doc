---
sidebar_position: 1
---

# Composition d'un évènement

Un **évènement** peut être créé directement depuis la partie publique du site par :
- un **Administrateur**
- un **Directeur de plongée**

Un **évènement** doit être créé avec les champs suivants :
- Type
- Nom (optionnel)
- Date
- Heure
- Site de plongée
- Participants maximum
- Contenu

<details>
    <summary>Données d'un <code>évènement</code></summary>

| Champ          | Type            | Valeur par défaut   |
|----------------|-----------------|---------------------|
| id             | int UNSIGNED AI | -                   |
| type_id        | int UNSIGNED    | -                   |
| name           | varchar 128     | NULL                |
| e_date         | date            | -                   |
| e_time         | time            | -                   |
| location       | varchar 128     | -                   |
| required_level | int             | NULL                |
| max_people     | int             | NULL                |
| content        | blob            | NULL                |
| user_id        | int             | -                   |
| created_at     | datetime        | current_timestamp   |
| updated_at     | datetime        | NULL                |
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

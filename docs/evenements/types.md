---
sidebar_position: 2
---

# Types d'évènement

Un **évènement** peut être créé par un **Administrateur** ou un **Directeur de plongée**
directement depuis la partie publique du site.<br/>


- `src/pages/index.js` -> `localhost:3000/`
- `src/pages/foo.md` -> `localhost:3000/foo`
- `src/pages/foo/bar.js` -> `localhost:3000/foo/bar`

## Create your first React Page

Create a file at `src/pages/my-react-page.js`:

```jsx title="src/pages/my-react-page.js"
function save_inputs()
{
    foreach ($_POST as $key => $value) {
    if (in_array($key, ['password'])) {
        continue;
    }
    $_SESSION['inputs'] = $_SESSION['inputs'] ?? [];
    $_SESSION['inputs'][$key] = $value;
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

<?php

namespace App\Models;

class Navigation
{
    /** PAGES */

    public static function getPages($where = null): bool|array
    {
        if (!is_null($where)) {
            $query = pdo()->prepare(
                "SELECT *,
                p.id as id, p.name as name, p.slug as slug, m.id as menu_id, m.name as menu_name, m.slug as menu_slug
                FROM page p LEFT JOIN menu m on m.id = p.menu_id
                WHERE {$where}
                ORDER BY p.name"
            );
        } else {
            $query = pdo()->prepare(
                "SELECT *,
                p.id as id, p.name as name, p.slug as slug, m.id as menu_id, m.name as menu_name, m.slug as menu_slug
                FROM page p LEFT JOIN menu m on m.id = p.menu_id
                ORDER BY p.name"
            );
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function getPage(int $id)
    {
        $query = pdo()->prepare("SELECT * FROM page WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch();
    }

    public static function getPageBySlug(string $slug)
    {
        $query = pdo()->prepare("SELECT * FROM page WHERE slug = ?");
        $query->execute([sanitize($slug)]);
        return $query->fetch();
    }

    public static function addPage($data)
    {
        validate([
            'name' => ['required', "unique:page:name"]
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);
        isset($data['is_in_menu']) ? $isInMenu = 1 : $isInMenu = 0;
        $isInMenu == 1 ? $menuId = sanitize(intval($data['menu_id'])) : $menuId = null;
        $content = $data['content'];

        $query = pdo()->prepare("INSERT INTO page (name, slug, content, menu_id) VALUES (?, ?, ?, ?)");
        $success = $query->execute([$name, $slug, $content, $menuId]);

        $success === true
            ? flash_success("La page <b>$name</b> a été créée")
            : flash_warning("Erreur lors de la création de la page");
        redirect(ADMIN_PAGES);
    }

    public static function editPage($data, int $id)
    {
        validate([
            'name' => ['required', "unique_exception:page:name:$id"]
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);
        isset($data['is_in_menu']) ? $isInMenu = 1 : $isInMenu = 0;
        $isInMenu == 1 ? $menuId = sanitize(intval($data['menu_id'])) : $menuId = null;
        $content = $data['content'];

        $query = pdo()->prepare("UPDATE page SET name = ?, slug = ?, content = ?, menu_id = ?, updated_at = NOW() WHERE id = ?");
        $success = $query->execute([$name, $slug, $content, $menuId, sanitize($id)]);

        $success === true
            ? flash_success("La page <b>$name</b> a été modifiée")
            : flash_warning("Erreur lors de la modification de la page");
        redirect(ADMIN_PAGES);
    }

    public static function deletePage(int $id)
    {
        $query = pdo()->prepare("DELETE FROM page WHERE id = ?");
        $success = $query->execute([sanitize($id)]);
        if ($success === true) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /** MENUS */

    public static function getMenus(): bool|array
    {
        $query = pdo()->prepare("SELECT * FROM menu ORDER BY name");
        $query->execute();
        return $query->fetchAll();
    }

    public static function getMenu(int $id)
    {
        $query = pdo()->prepare("SELECT * FROM menu WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch();
    }

    public static function addMenu($data)
    {
        validate([
            'name' => ['required', "unique:menu:name"]
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);

        $query = pdo()->prepare("INSERT INTO menu (name, slug) VALUES (?, ?)");
        $success = $query->execute([$name, $slug]);

        $success === true
            ? flash_success("Le menu <b>$name</b> a été créé")
            : flash_warning("Erreur lors de la création du menu");
        redirect(ADMIN_MENUS);
    }

    public static function editMenu($data, int $id)
    {
        validate([
            'name' => ['required', "unique_exception:menu:name:$id"]
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);

        $query = pdo()->prepare("UPDATE menu SET name = ?, slug = ?, updated_at = NOW() WHERE id = ?");
        $success = $query->execute([$name, $slug, sanitize($id)]);

        $success === true
            ? flash_success("Le menu <b>$name</b> a été modifié")
            : flash_warning("Erreur lors de la modification du menu");
        redirect(ADMIN_MENUS);
    }

    public static function deleteMenu(int $id)
    {
        // If pages are in menu, update them to set their parent to null
        $query = pdo()->prepare("UPDATE page SET menu_id = NULL WHERE menu_id = ?");
        $query->execute([$id]);
        // Delete the menu itself
        $query = pdo()->prepare("DELETE FROM menu WHERE id = ?");
        $success = $query->execute([sanitize($id)]);
        if ($success === true) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
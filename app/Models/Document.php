<?php

namespace App\Models;

class Document
{
    private int $id;
    private string $name;
    private string $slug;
    private string $description;
    private int|bool $approval;

    public static function getAll(string $orderBy = 'name', string $where = null): bool|array
    {
        if (is_null($where)) {
            $query = pdo()->prepare("SELECT * FROM document ORDER BY {$orderBy}");
        } else {
            $query = pdo()->prepare("SELECT * FROM document WHERE {$where} ORDER BY {$orderBy}");
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function get(int $id)
    {
        $query = pdo()->prepare("SELECT * FROM document WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch() ?: abort_404();
    }

    public static function add($data)
    {
        validate([
            'name' => ['required', 'unique:document:name'],
            'description' => ['max:200']
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);
        $description = sanitize($data['description']) ?? null;
        if (isset($data['approval']) && $data['approval'] === 'on') {
            $approval = 1;
        } else {
            $approval = 0;
        }

        $query = pdo()->prepare("INSERT INTO document (name, slug, description, approval) VALUES (?, ?, ?, ?)");
        $success = $query->execute([$name, $slug, $description, $approval]);

        $success === true
        ? flash_success("Document <b>$name</b> ajouté")
        : flash_warning("Erreur lors de l'ajout");
    }

    public static function edit($data, int $id)
    {
        validate([
            'name' => ['required', "unique_exception:document:name:$id"],
            'description' => ['max:200'],
        ]);

        $name = sanitize($data['name']);
        $slug = slugify($name);
        $description = sanitize($data['description']) ?? null;
        if (isset($data['approval']) && $data['approval'] === 'on') {
            $approval = 1;
        } else {
            $approval = 0;
        }

        $query = pdo()->prepare("UPDATE document SET name = ?, slug = ?, description = ?, approval = ? WHERE id = ?");
        $success = $query->execute([$name, $slug, $description, $approval, sanitize($id)]);

        $success === true
            ? flash_success("Document <b>$name</b> modifié")
            : flash_warning("Erreur lors de la modification");
        redirect(ADMIN_DOCUMENTS);
    }

    public static function delete(int $id): bool
    {
        $query = pdo()->prepare("DELETE FROM document WHERE id = ?");
        return $query->execute([sanitize($id)]);
    }

}
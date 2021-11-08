<?php

namespace App\Models;

class DivingLevel
{
    private int $id;
    private string $name;
    private string $description;
    private int $rank;

    public static function getAll(string $orderBy = 'position', string $columns = '*', string $where = null): bool|array
    {
        if (is_null($where)) {
            $query = pdo()->prepare("SELECT {$columns} FROM diving_level ORDER BY {$orderBy}");
        } else {
            $query = pdo()->prepare("SELECT {$columns} FROM diving_level WHERE {$where} ORDER BY {$orderBy}");
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function getCount(): int
    {
        $query = pdo()->prepare("SELECT COUNT(id) as count FROM diving_level");
        $query->execute();
        return intval($query->fetch()->count);
    }

    public static function get(int $id)
    {
        $query = pdo()->prepare("SELECT * FROM diving_level WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch() ?: abort_404();
    }

    public static function add($data)
    {
        validate([
            'name' => ['required', 'unique:diving_level:name'],
            'description' => ['max:200'],
        ]);

        // Set position value equals $count + 1
        $count = DivingLevel::getCount();

        $name = sanitize($data['name']);
        $description = sanitize($data['description']) ?? null;

        $query = pdo()->prepare("INSERT INTO diving_level (name, description, position) VALUES (?, ?, ?)");
        $success = $query->execute([$name, $description, $count + 1]);

        $success === true
        ? flash_success("<b>$name</b> ajouté")
        : flash_warning("Erreur lors de l'ajout");
    }

    public static function edit($data, int $id)
    {
        validate([
            'name' => ['required', "unique_exception:diving_level:name:$id"],
            'description' => ['max:200'],
        ]);

        $name = sanitize($data['name']);
        $description = sanitize($data['description']) ?? null;

        $query = pdo()->prepare("UPDATE diving_level SET name = ?, description = ? WHERE id = ?");
        $success = $query->execute([$name, $description, sanitize($id)]);

        $success === true
            ? flash_success("<b>$name</b> modifié")
            : flash_warning("Erreur lors de la modification");
        redirect(ADMIN_DIVING_LEVELS);
    }

    public static function delete(int $id): bool
    {
        $query = pdo()->prepare("DELETE FROM diving_level WHERE id = ?");
        return $query->execute([sanitize($id)]);
    }

    public static function getPosition(int $id)
    {
        $query = pdo()->prepare("SELECT position FROM diving_level WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch()->position;
    }

}
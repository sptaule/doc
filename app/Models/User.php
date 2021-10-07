<?php

namespace App\Models;

class User
{
    public static function getAll(string $orderBy = 'created_at DESC', string $where = null): bool|array
    {
        $query = pdo()->prepare("SELECT * FROM user WHERE ? ORDER BY ?");
        $query->execute([$where, $orderBy]);
        return $query->fetchAll();
    }

    public static function getGenres(): array
    {
        return $genres = [
            (object) ['id' => 1, "name" => "Homme"],
            (object) ['id' => 2, "name" => "Femme"]
        ];
    }
}
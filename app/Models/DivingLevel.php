<?php

namespace App\Models;

class DivingLevel
{
    private int $id;
    private string $name;
    private string $description;
    private int $rank;

    public static function getAll(string $orderBy = 'order', string $where = null): bool|array
    {
        $query = pdo()->prepare("SELECT * FROM diving_level WHERE ? ORDER BY ?");
        $query->execute([sanitize($where), sanitize($orderBy)]);
        return $query->fetchAll();
    }

    public static function get(int $id): bool|array
    {
        $query = pdo()->prepare("SELECT * FROM diving_level WHERE id = ?");
        $query->execute([sanitize($id)]);
        return $query->fetch();
    }



}
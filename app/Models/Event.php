<?php

namespace App\Models;

use Symfony\Component\Routing\RouteCollection;

class Event
{
    public static function getTypes(string $orderBy = 'name', string $where = null): bool|array
    {
        if (is_null($where)) {
            $query = pdo()->prepare("SELECT * FROM event_type ORDER BY {$orderBy}");
        } else {
            $query = pdo()->prepare("SELECT * FROM event_type WHERE {$where} ORDER BY {$orderBy}");
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function getType(int $id): object
    {
        $query = pdo()->prepare("SELECT * FROM event_type WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function addType($data)
    {

    }

    public static function editType($data)
    {

    }
}
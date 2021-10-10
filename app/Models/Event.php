<?php

namespace App\Models;

use Symfony\Component\Routing\RouteCollection;

class Event
{
    public static function getTypes(string $orderBy = 'name', string $where = null)
    {
        if (is_null($where)) {
            $query = pdo()->prepare("SELECT * FROM event_type ORDER BY {$orderBy}");
        } else {
            $query = pdo()->prepare("SELECT * FROM event_type WHERE {$where} ORDER BY {$orderBy}");
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function addType($data)
    {

    }
}
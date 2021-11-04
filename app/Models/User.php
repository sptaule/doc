<?php

namespace App\Models;

use DateTime;

class User
{
    public static function getAll($orderBy = null): bool|array
    {
        if (!is_null($orderBy)) {
            $query = pdo()->prepare("SELECT * FROM user ORDER BY {$orderBy}");
            $query->execute();
        } else {
            $query = pdo()->prepare("SELECT * FROM user");
            $query->execute();
        }
        return $query->fetchAll();
    }

    public static function getGenres(): array
    {
        return $genres = [
            (object) ['id' => 1, "name" => "Homme"],
            (object) ['id' => 2, "name" => "Femme"]
        ];
    }

    public static function getSkills(): array
    {
        $query = pdo()->prepare("SELECT * FROM skill ORDER BY id");
        $query->execute();
        return $query->fetchAll();
    }

    public static function getRanks(): array
    {
        $query = pdo()->prepare("SELECT * FROM `rank` ORDER BY rank_id");
        $query->execute();
        return $query->fetchAll();
    }

    public static function getAge(string $birthDate): int
    {
        $age = date_diff(date_create($birthDate), date_create(date("d-m-Y")));
        return intval($age->format("%y"));
    }

    public static function getLastConnection(string $lastConnection): string
    {
        $date = new DateTime($lastConnection);
        return strftime(Club::getValue('date_format') . " à " . Club::getValue('time_format'), $date->getTimestamp());
    }

    public static function register(mixed $data)
    {
        validate([
            'firstname' => ['required', 'min:2', 'max:64'],
            'lastname' => ['required', 'min:2', 'max:64'],
            'birthdate' => ['required', 'min:10', 'max:10', 'birthdate'],
            'email' => ['required', 'email', 'max:128'],
            'phone' => ['min:10', 'max:10', 'number'],
        ]);

        if ($data['genre'] != "Homme" && $data['genre'] != "Femme") {
            save_inputs();
            flash_warning("Merci de sélectionnez votre sexe");
            redirect_self();
        }


    }
}
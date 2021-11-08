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

    public static function getGenres($returnArray = null): array
    {
        if (is_null($returnArray)) {
            return $genres = [
                (object) ['id' => 1, "name" => "Homme"],
                (object) ['id' => 2, "name" => "Femme"]
            ];
        } else {
            return $genres = ["Homme", "Femme"];
        }
    }

    public static function getSkills($columns = '*'): array
    {
        $query = pdo()->prepare("SELECT {$columns} FROM skill ORDER BY id");
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
            'lastname' => ['required', 'min:2', 'max:64'],
            'firstname' => ['required', 'min:2', 'max:64'],
            'genre' => ['required', 'genre'],
            'birthdate' => ['required', 'min:10', 'max:10', 'birthdate'],
            'email' => ['required', 'email', 'max:128', 'unique:user:email'],
            'phone' => ['min:10', 'max:10', 'telephone'],
            'password' => ['min:8', 'max:128'],
            'diving_level_id' => ['required', 'divingLevel'],
            'skills' => ['skills']
        ]);

        if ($data['password'] != $data['password_conf']) {
            flash_warning("Les mots de passe ne sont pas identiques");
            save_inputs();
            redirect_self();
        }

        $lastname = sanitize($data['lastname']);
        $firstname = sanitize($data['firstname']);
        $genre = sanitize($data['genre']);
        $birthdate = format_date_sql(sanitize($data['birthdate']));
        $email = sanitize($data['email']);
        $phone = sanitize($data['phone']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $divingLevelId = sanitize($data['diving_level_id']);

        // If the manual approval is not set, approve user account asa registration is complete
        Club::getValue('manual_user_approval') == 0 ? $approved = 1 : $approved = 0;

        $query = pdo()->prepare("
            INSERT INTO user
                (lastname, firstname, genre, birthdate, email, phone, password, rank_id, diving_level_id, token)
            VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $query->execute([$lastname, $firstname, $genre, $birthdate, $email, $phone, $password, 1, $divingLevelId, random_str(64)]);
        $userId = pdo()->lastInsertId();

        foreach ($data['skills'] as $k => $skill) {
            $query = pdo()->prepare("INSERT INTO user_skill (user_id, skill_id) VALUE (?, ?)");
            $query->execute([$userId, $k]);
        }

        flash_success("
            Votre compte est désormais créé !<br>
            Afin de l'activer, un email vous a été envoyé à <b>$email</b>.<br>
            Pensez aussi à regarder dans les spams.
        ");
        redirect(PUBLIC_HOME);

    }
}
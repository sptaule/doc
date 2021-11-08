<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Libs\Picture;
use PDO;
use PDOException;

class Scuba
{
    public static function isDeployed(): bool
    {
        $cfgFile = BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php';

        /** If `config/core.php` defined with MySQL settings, then breaks setup process */
        if (
            str_contains(file_get_contents($cfgFile), "DB_HOST")
            && str_contains(file_get_contents($cfgFile), "DB_NAME")
            && str_contains(file_get_contents($cfgFile), "DB_USERNAME")
            && str_contains(file_get_contents($cfgFile), "DB_PASSWORD")
        ) {
            return true;
        } else {
            flash_warning("Scuba doit être installé");
            return false;
        }
    }

    public static function deploy(mixed $data): bool
    {
        validate([
            'lastname' => ['required', 'min:2'],
            'firstname' => ['required', 'min:2'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'db_host' => ['required'],
            'db_name' => ['required'],
            'db_username' => ['required'],
            'db_password' => ['required']
        ]);

        if ($data['password'] != $data['password_conf']) {
            flash_warning("Les mots de passe ne sont pas identiques"); save_inputs(); redirect_self();
        }

        /** Check if user has set an avatar */
        if ($_FILES['images']['name'][0] == '') {
            flash_warning("Vous devez choisir le logo du club"); save_inputs(); redirect_self();
        }

        // -- user info
        $user_lastname = $data['lastname'];
        $user_firstname = $data['firstname'];
        $user_email = $data['email'];
        $user_genre = $data['genre'];
        $user_birthdate = $data['birthdate'];
        $user_phone = $data['phone'] ?? '';
        $password = $data['password'];
        $user_password = password_hash($password, PASSWORD_DEFAULT);

        // -- club info
        $club_name = $data['club_name'] ?? '';
        $club_description = $data['club_description'] ?? '';

        // -- database info
        $db_host = $data['db_host'];
        $db_name = $data['db_name'];
        $db_username = $data['db_username'];
        $db_password = $data['db_password'];

        /** Process club logo and save it in different sizes */
        foreach ($_FILES['images']['tmp_name'] as $image) {
            Picture::upload_photo($image, "/ressources/images/club/logo/", ['small', 'medium', 'big'], 'logo', 'png');
        }

        /** Verify database credentials */
        try {
            $dbh = new pdo("mysql:host=$db_host;dbname=$db_name",
                $db_username,
                $db_password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $ex) {
            flash_danger("Vérifiez les informations de connexion à la base de données"); save_inputs(); redirect_self();
        }

        /** Write database credentials in `config/core.php` file */
        file_put_contents(BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php', "const DB_HOST = '$db_host';" . PHP_EOL, FILE_APPEND);
        file_put_contents(BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php', "const DB_NAME = '$db_name';" . PHP_EOL, FILE_APPEND);
        file_put_contents(BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php', "const DB_USERNAME = '$db_username';" . PHP_EOL, FILE_APPEND);
        file_put_contents(BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php', "const DB_PASSWORD = '$db_password';" . PHP_EOL, FILE_APPEND);

        /** Get all SQL files containing tables info and static data that will be created/inserted */
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $sqlFiles = glob(BASE_PATH . "/sql/*.sql");
        foreach ($sqlFiles as $sqlFile) {
            $sqlData = file_get_contents($sqlFile);
            $query = $pdo->prepare($sqlData);
            $query->execute();
        }

        /** Insert dynamic data */
        /* global_option */
        $query = $pdo->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'club_name'");
        $query->execute([$club_name]);
        $query = $pdo->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'club_description'");
        $query->execute([$club_description]);
        $query = $pdo->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'super_user_firstname'");
        $query->execute([$user_firstname]);
        $query = $pdo->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'super_user_lastname'");
        $query->execute([$user_lastname]);
        $query = $pdo->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'super_user_email'");
        $query->execute([$user_email]);

        /* user */
        $query = $pdo->prepare("INSERT INTO user (lastname, firstname, genre, birthdate, email, phone, password, rank_id, diving_level_id, skillset_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$user_lastname, $user_firstname, $user_genre, $user_birthdate, $user_email, $user_phone, $user_password, 3, 1, 1]);

        /** Check if scuba has been deployed correctly */
        if (Scuba::isDeployed()) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * @throws \Exception
     */
    public static function formatDateTime(string $datetime, bool $timestamp = false)
    {
        $date = new \DateTime($datetime);
        if (is_null($timestamp) || $timestamp === false) {
            $dateFormat = Club::getValue('date_format');
            $timeFormat = Club::getValue('time_format');
            return strftime($dateFormat . ' à ' . $timeFormat, $date->getTimestamp());
        }
        else {
            return $date->getTimestamp();
        }
    }

    public static function formatColor(string $color, $hashtag = true): string
    {
        if (str_contains($color, '#') && $hashtag === true) {
            return strtoupper($color);
        }
        $hashtag === true
            ? $str = '#' . $color
            : $str = str_replace('#', '', $color);
        return strtoupper($str);
    }

    public static function rgbToHex(string $rgbColor): string
    {
        $rgbArray = explode(",", $rgbColor,3);
        return sprintf("#%02x%02x%02x", $rgbArray[0], $rgbArray[1], $rgbArray[2]);
    }

    /** Emails */

    public static function send_mail(string $subject, string $body, array $recipients)
    {
        $mail = new PHPMailer();
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'solevitapringles@gmail.com';
            $mail->Password = 'a****6';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;

            $mail->setLanguage('fr');
            $mail->setFrom('solevitapringles@gmail.com', 'Hubert Patoulatchi');
            foreach ($recipients as $recipient) {
                $mail->addAddress($recipient);
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody =  htmlspecialchars($body);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
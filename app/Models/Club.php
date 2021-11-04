<?php

namespace App\Models;

class Club
{
    public static function getValue(string $global_option_name): string
    {
        $query = pdo()->prepare("SELECT * FROM global_option WHERE global_option_name = ?");
        $query->execute([$global_option_name]);
        return $query->fetch()->global_option_value;
    }

    public static function getInfo(string $info): int|bool|string
    {
        $query = pdo()->prepare("SELECT global_option_value FROM global_option WHERE global_option_name = ?");
        $query->execute([sanitize($info)]);
        return $query->fetch()->global_option_value;
    }

    public static function getInfos(): bool|array
    {
        $clubName = Club::getValue('club_name');
        $clubDescription = Club::getValue('club_description');
        $superUserFirstname = Club::getValue('super_user_firstname');
        $superUserLastname = Club::getValue('super_user_lastname');
        $superUserEmail = Club::getValue('super_user_email');
        $allowRegistrations = Club::getValue('allow_registrations');
        $dateFormat = Club::getValue('date_format');
        $timeFormat = Club::getValue('time_format');
        $facebookUrl = Club::getValue('facebook_url');
        $instagramUrl = Club::getValue('instagram_url');
        $youtubeUrl = Club::getValue('youtube_url');
        $whatsappUrl = Club::getValue('whatsapp_url');
        $twitterUrl = Club::getValue('twitter_url');
        $snapchatUrl = Club::getValue('snapchat_url');
        return [$clubName, $clubDescription, $superUserFirstname, $superUserLastname, $superUserEmail, $allowRegistrations, $dateFormat, $timeFormat, $facebookUrl, $instagramUrl, $youtubeUrl, $whatsappUrl, $twitterUrl, $snapchatUrl];
    }

    public static function updateInfos($data)
    {
        $success = false;

        validate([
            'club_name' => ['required'],
            'club_description' => ['required'],
            'super_user_firstname' => ['required'],
            'super_user_lastname' => ['required'],
            'super_user_email' => ['required', 'email'],
            'date_format' => ['required'],
            'min_age_to_register' => ['required'],
            'max_age_to_register' => ['required'],
        ]);

        foreach ($data as $key => $d) {
            if ($key != 'CSRF_TOKEN' && $key != 'allow_registrations') {
                $query = pdo()->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = ?");
                $success = $query->execute([$d, $key]);
            }
        }

        // Different treatment for checkboxes
        $allowRegistrations = isset($data['allow_registrations']) ? 1 : 0;
        $query = pdo()->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'allow_registrations'");
        $query->execute([$allowRegistrations]);

        $manualUserApproval = isset($data['manual_user_approval']) ? 1 : 0;
        $query = pdo()->prepare("UPDATE global_option SET global_option_value = ? WHERE global_option_name = 'manual_user_approval'");
        $query->execute([$manualUserApproval]);

        $success === true
            ? flash_success("Les informations ont été mises à jour")
            : flash_warning("Erreur lors de la modification");
        redirect(ADMIN_CLUB);
    }
}
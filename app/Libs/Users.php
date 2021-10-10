<?php

use JetBrains\PhpStorm\NoReturn;
use PHPMailer\PHPMailer\PHPMailer;

class User {

    public int $id;
    public string $email;
    public string $password;
    public string $firstname;
    public string $lastname;
    public string $telephone;
    public bool $active;
    public string $created_at;

    /**
     * @param array $data
     * Crée un compte utilisateur (à activer).
     */
    #[NoReturn] public static function register(array $data)
    {
        validate([
            'email' => ['required', 'email', 'email_not_already_in_use'],
            'password' => ['required', 'password'],
            'password_confirmation' => ['required', 'password'],
            'firstname' => ['required', 'name'],
            'lastname' => ['required', 'name'],
            'telephone' => ['telephone'],
            'security' => ['required'],
        ]);

        $email = sanitize($data['email']);
        $password = sanitize($data['password']);
        $password_confirmation = sanitize($data['password_confirmation']);
        $firstname = sanitize($data['firstname']);
        $lastname = sanitize($data['lastname']);
        $telephone = sanitize($data['telephone']) ?? null;
        $token = random_str(42); // Generate token for future activation
        $security = intval(sanitize($_POST['security']));

        if ($password != $password_confirmation) {
            save_inputs();
            flash_warning("Les mots de passe ne correspondent pas");
            redirect_self();
        }

        if ($security != $_SESSION['captcha_result']) {
            save_inputs();
            flash_warning("Vérifie la réponse à la question de sécurité");
            redirect_self();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = pdo()->prepare("INSERT INTO users (email, password, firstname, lastname, telephone, token) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$email, $password, $firstname, $lastname, $telephone, $token]);

        User::send_registration_email($firstname, $lastname, $email, $token);
    }

    /**
     * @param string $email
     * @param string $password
     * Connecte un utilisateur grâce à son email et password.
     */
    #[NoReturn] public static function login(string $email, string $password)
    {
        $query = pdo()->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch();
        if ($user && password_verify($password, $user->password) && $user->active == 0) {
            flash_warning("Merci de valider ton compte avant de te connecter<br>Le lien d'activation a été envoyé sur ton adresse email");
            save_inputs();
            redirect_self();
        }
        if ($user && password_verify($password, $user->password) && $user->active == 1) {
            $_SESSION['user'] = $user;
            flash_success("Bonjour <b>{$user->firstname}</b> !");
            redirect(USER_DASHBOARD);
        } else {
            flash_warning("Email ou mot de passe incorrect");
            save_inputs();
            redirect_self();
        }
    }

    /**
     * @param array $data
     * @param int $user_id
     * Met à jour les informations générales de l'utilisateur.
     */
    #[NoReturn] public static function update_general(array $data, int $user_id)
    {
        validate([
            'firstname' => ['required'],
            'lastname' => ['required', 'min:8', 'max:100'],
            'email' => ['required']
        ]);

        $firstname = sanitize($data['firstname']);
        $lastname = sanitize($data['lastname']);
        $email = sanitize($data['email']);
        $telephone = sanitize($data['telephone']) ?? null;

        // If user changes his email, check that it is not already taken
        $query = pdo()->prepare("SELECT firstname FROM users WHERE email = ? AND id != ?");
        $query->execute([$email, $user_id]); $result = $query->rowCount();
        if ($result == 1) {
            flash_warning("Il existe déjà un compte avec l'adresse <b>$email</b>");
            save_inputs();
            redirect_self();
        } else {
            $query = pdo()->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, telephone = ? WHERE id = ?");
            $query->execute([$firstname, $lastname, $email, $telephone, $user_id]);
            flash_success("Tes infos ont été modifiées avec succès");
            redirect_self();
        }
    }

    /**
     * @param array $data
     * @param int $user_id
     * Met à jour le mot de passe de l'utilisateur.
     */
    #[NoReturn] public static function update_password(array $data, int $user_id)
    {
        validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'max:100'],
            'new_password_confirmation' => ['required']
        ]);

        $current_password = $data['current_password'];
        $new_password = $data['new_password'];
        $new_password_confirmation = $data['new_password_confirmation'];

        if ($new_password != $new_password_confirmation) {
            flash_warning("Les 2 nouveaux mots de passe ne correspondent pas");
            redirect_self();
        }

        // Get user info
        $query = pdo()->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$user_id]);
        $user = $query->fetch();

        // If current password is correct (security reasons), update user password
        if ($user && password_verify($current_password, $user->password)) {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = pdo()->prepare("UPDATE users SET password = ? WHERE id = ?");
            $query->execute([$new_password, $user_id]);
            flash_success("Ton mot de passe a été mis à jour");
            redirect_self();
        } else {
            flash_warning("Ton mot de passe actuel n'est pas correct");
            redirect_self();
        }

    }

    /**
     * @param array $data
     * @param int $user_id
     * Met à jour l'addresse de l'utilisateur. Si l'addresse n'a pas déjà été créée, alors elle le sera.
     */
    #[NoReturn] public static function update_address(array $data, int $user_id)
    {
        validate([
            'address_line_1' => ['required', 'min:8'],
            'city' => ['required'],
            'postal_code' => ['required', 'min:5', 'max:5'],
            'country' => ['required'],
        ]);

        $address_line_1 = sanitize($data['address_line_1']);
        $address_line_2 = sanitize($data['address_line_2']) ?? null;
        $city = sanitize($data['city']);
        $postal_code = sanitize($data['postal_code']);
        $country = sanitize($data['country']);

        /*
         * Compare submitted country with allowed countries.
         * If country doesn't exist, redirect user with error.
         */
        $query = pdo()->prepare("SELECT id FROM countries WHERE name_fr_fr = ?"); $query->execute([$country]); $result = $query->rowCount();
        if ($result == 0) {
            flash_danger("Merci de choisir un pays depuis la liste !");
            save_inputs();
            redirect_self();
        }

        /*
         * Check if user address record already exist in database.
         * If no record, create user address, otherwise update it.
         */
        $query = pdo()->prepare("SELECT id FROM addresses WHERE user_id = ?"); $query->execute([$user_id]); $result = $query->rowCount();
        if ($result == 1) {
            $query = pdo()->prepare("UPDATE addresses SET address_line_1 = ?, address_line_2 = ?, city = ?, postal_code = ?, country = ? WHERE user_id = ?");
            $query->execute([$address_line_1, $address_line_2, $city, $postal_code, $country, $user_id]);
        } else {
            $query = pdo()->prepare("INSERT INTO addresses (user_id, address_line_1, address_line_2, city, postal_code, country) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$user_id, $address_line_1, $address_line_2, $city, $postal_code, $country]);
        }

        flash_success("Ton adresse a bien été enregistrée !");
        redirect_self();
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $token
     * Envoie l'email de confirmation à l'utilisateur.
     */
    public static function send_registration_email(string $firstname, string $lastname, string $email, string $token)
    {
        $mail = new PHPMailer(TRUE);

        $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP
        $mail->Host = 'mail.adopteunpiaf.com'; // Spécifier le serveur SMTP
        $mail->SMTPAuth = true; // Activer authentication SMTP
        $mail->Username = 'inscription@adopteunpiaf.com'; // Votre adresse email d'envoi
        $mail->Password = "QtBixqcdFj8AHY4q4ONI"; // Le mot de passe de cette adresse email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
        $mail->Port = 465;

        $body = "<div style='background:#E4761C;padding:10px;text-align:center;width:600px;'>";
        $body .= "<img src='https://adopteunpiaf.com/images/logo-aup-black.png'/>";
        $body .= "<h1 style='margin:10px 0;color:#278ea9;'>Ton inscription sur <span style='font-weight:bold'>AdopteUnPiaf</span></h1>";
        $body .= "<p>Super de t'avoir parmi nous {$firstname} {$lastname}, tu es désormais inscrit(e) sur <b>AdopteUnPiaf</b>.</p>";
        $body .= "<p>Afin d'activer ton compte, tu dois cliquer sur le bouton ci-dessous.</p>";
        $body .= '<p><a style="background:#151718;text-decoration:none;font-size:22px;border-radius:5px;color:#e7dddd;padding:10px 15px;margin:15px 0;display:inline-block;" href="https://adopteunpiaf.com/user/activate.php?token=' . $token .'"><b>Activer mon compte</b></a></p>';
        $body .= "<p>Merci et à bientôt sur <a href='https://adopteunpiaf.com/' target='_blank' style='font-weight:bold'>AdopteUnpiaf</a></p>";
        $body .= "<p style='font-size:11px;font-style:italic'>Ceci est un email automatique. Merci de ne pas y répondre.</p>";
        $body .= "</div>";
        $mail->CharSet = "UTF-8";
        try {
            $mail->setLanguage('fr');
            $mail->setFrom('inscription@adopteunpiaf.com', 'AdopteUnPiaf');
            $mail->addAddress("{$email}", "{$firstname} {$lastname}");
            $mail->Subject = 'Activation de ton compte - AdopteUnPiaf';
            $mail->Body = $body;
            $mail->IsHTML(true);
            $mail->send();
        }
        catch (Exception $e)
        {
            echo "Le message n'a pas pu être envoyé : <b>" . $mail->ErrorInfo . "</b>";
        }
    }

}
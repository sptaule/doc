<?php

use App\Models\Club;
use App\Models\DivingLevel;
use App\Models\User;

function get_errors()
{
    static $errors;
    if ($errors) {
        return $errors;
    }
    $errors = $_SESSION['errors'] ?? [];
    $_SESSION['errors'] = [];
    return $errors;
}

function get_error($key)
{
    return get_errors()[$key] ?? null;
}

function validate($rules = [])
{
    foreach ($rules as $key => $validations)
    {
        $value = $_POST[$key] ?? $_FILES[$key] ?? null;
        foreach ($validations as $validation)
        {
            if (is_callable($validation)) { // if anonymous function
                $error = $validation($value);
            } else {
                if (str_contains($validation, ':') && count(explode(':', $validation)) == 2) {
                    $fnName = explode(':', $validation)[array_key_first(explode(':', $validation))];
                    $fnValue = explode(':', $validation)[array_key_last(explode(':', $validation))];
                    if (is_callable('validate_' . $fnName)) {
                        $validation_function = "validate_{$fnName}";
                        $error = $validation_function($value, $fnValue);
                    }
                } elseif (str_contains($validation, ':') && count(explode(':', $validation)) == 3) {
                    $fnName = explode(':', $validation)[array_key_first(explode(':', $validation))];
                    $fnTable = explode(':', $validation)[floor((count(explode(':', $validation)) - 1) / 2)];
                    $fnColumn = explode(':', $validation)[array_key_last(explode(':', $validation))];
                    if (is_callable('validate_' . $fnName)) {
                        $validation_function = "validate_{$fnName}";
                        $error = $validation_function($fnTable, $fnColumn, $value);
                    }
                } elseif (str_contains($validation, ':') && count(explode(':', $validation)) == 4) {
                    $fnName = explode(':', $validation)[array_key_first(explode(':', $validation))];
                    $fnTable = explode(':', $validation)[array_key_first(explode(':', $validation)) + 1];
                    $fnColumn = explode(':', $validation)[array_key_last(explode(':', $validation)) - 1];
                    $fnExceptionValue = explode(':', $validation)[array_key_last(explode(':', $validation))];
                    if (is_callable('validate_' . $fnName)) {
                        $validation_function = "validate_{$fnName}";
                        $error = $validation_function($fnTable, $fnColumn, $fnExceptionValue, $value);
                    }
                } else {
                    $validation_function = "validate_{$validation}";
                    $error = $validation_function($value);
                }
            }
            if (isset($error)) {
                $_SESSION['errors'] = $_SESSION['errors'] ?? [];
                $_SESSION['errors'][$key] = $error;
                break;
            }
        }
        if (!empty($_SESSION['errors'][$key])) {
            save_inputs();
            redirect_self();
        }
    }
}

function validate_required($value)
{
    if (isset($value['tmp_name']) AND empty($value['tmp_name'])) {
        return "Veuillez sélectionner un fichier";
    }

    if (empty($value)) {
        return "Le champ est requis";
    }
}

function validate_unique(&$table, &$column, $value)
{
    $query = pdo()->prepare("SELECT * FROM {$table} WHERE {$column} LIKE ?");
    $query->execute([$value]);
    $result = $query->rowCount();
    if ($result != 0) {
        return "<b class='text-red-500 tracking-wide'>$value</b> existe déjà";
    }
}

function validate_unique_exception(&$table, &$column, &$ExceptionValue, $value)
{
    $query = pdo()->prepare("SELECT * FROM {$table} WHERE id != ? AND {$column} LIKE ?");
    $query->execute([$ExceptionValue, $value]);
    $result = $query->rowCount();
    if ($result != 0) {
        return "<b class='text-red-500 tracking-wide'>$value</b> est déjà utilisé";
    }
}

function validate_min($string, &$val)
{
    if (strlen($string) > 0) {
        if (strlen($string) < $val) {
            return "Taille minimale de $val " . pluralize(intval($val), 'caractère', 'caractère', 'caractères');
        }
    }
}

function validate_max($string, &$val)
{
    if (strlen($string) > 0) {
        if (strlen($string) > $val) {
            return "Taille maximale de $val " . pluralize(intval($val), 'caractère', 'caractère', 'caractères');
        }
    }
}

function validate_image($image_info)
{
    if (is_null($image_info) OR $image_info['error'] === 4) {
        return "Veuillez sélectionner une image";
    }

    if ($image_info['error'] !== UPLOAD_ERR_OK OR !is_uploaded_file($image_info['tmp_name'])) {
        return $image_info['error'];
    }

    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        return "Formats autorisés : JPG, PNG";
    }
}

function validate_expiration_date($date)
{
    if (strtotime($date) <= time()) {
        return "Entrez une date ultérieure";
    }
}

function validate_pdf($pdf_info)
{
    if (is_null($pdf_info) OR $pdf_info['error'] === 4) {
        return "Veuillez sélectionner un fichier PDF";
    }

    if ($pdf_info['error'] !== UPLOAD_ERR_OK OR !is_uploaded_file($pdf_info['tmp_name'])) {
        return "Mauvais envoi";
    }

    $extension = pathinfo($pdf_info['name'], PATHINFO_EXTENSION);

    if (!in_array($extension, ['pdf'])) {
        return "Format autorisé : PDF";
    }
}

function validate_email($email)
{
    $parts = explode("@", $email);
    if (count($parts) !== 2) {
        return "Adresse email incorrecte";
    }
    [$name, $domain] = $parts;
    if (empty($name) OR empty($domain)) {
        return "Adresse email incorrecte";
    }
}

function validate_email_not_already_in_use(string $email)
{
    $email = htmlspecialchars($email);
    $query = pdo()->prepare("SELECT email FROM users WHERE email = ?");
    $query->execute([$email]);
    $result = $query->fetch();
    if (!empty($result)) {
        return "Un compte existe déjà avec cette adresse<br>
            Si ce compte est à toi et que tu as oublié ton mot de passe<br>
            <a href='/user/recover.php' class='link'>clique ici</a>";
    }
}

function validate_name($name, $minLength = 2)
{
    if (strlen($name) < $minLength) {
        return "{$minLength} caractères minimum";
    }
    if (!ctype_alpha(str_replace(array(' ', '-', 'É', 'é', 'è', 'ë', 'ï', 'ö'), '', $name))) {
        return "Lettres, accents, espaces et tirets uniquement";
    }
}

function validate_search_name($name)
{
    if (1 === preg_match('~[0-9]~', $name)){
        return "Lettres, accents, espaces et tirets uniquement";
    }
    if (is_numeric($name)) {
        return "Lettres, accents, espaces et tirets uniquement";
    }
}

function validate_birthdate($birthday)
{
    $minAge = Club::getValue('min_age_to_register');
    $maxAge = Club::getValue('max_age_to_register');
    $bDay = str_replace('/', '-', $birthday);
    if (is_string($bDay)) {
        $bDay = strtotime($bDay);
    }
    // 31536000 is the number of seconds in a 365 days year.
    if (time() - $bDay < $minAge * 31536000)  {
        return "Vous devez avoir $minAge ans minimum pour vous inscrire";
    }
    if (time() - $bDay > $maxAge * 31536000)  {
        return "Vous devez avoir $maxAge ans maximum pour vous inscrire";
    }
}

function validate_number($input)
{
    if (!$input) {
        return;
    }
    if (!is_numeric($input)) {
        return "Chiffres uniquement";
    }
    if (is_float($input)) {
        return "Chiffres ronds uniquement";
    }
}

function validate_telephone($input)
{
    if (!$input) {
        return;
    }
    if (!is_numeric($input)) {
        return "Chiffres uniquement";
    }
    if (is_float($input)) {
        return "Chiffres ronds uniquement";
    }
    if (strlen($input) != 10) {
        return "Le numéro doit faire 10 caractères";
    }
}

function validate_genre($input)
{
    $genres = User::getGenres(true);
    if (!in_array($input, $genres)) {
        return "Merci de choisir parmi les sexes proposés";
    }
}

function validate_divingLevel($input)
{
    $divingLevels = simple_array(DivingLevel::getAll('position', 'id'));
    if (!in_array($input, $divingLevels)) {
        return "Merci de choisir parmi les niveaux proposés";
    }
}

function validate_skills($input)
{
    $skills = simple_array(User::getSkills('id'));
    foreach ($input as $key => $skill) {
        if (!in_array($key, $skills)) {
            return "Merci de choisir parmi les formations proposées";
        }
    }
}

function validate_search_number($name)
{
    if (!is_numeric($name)) {
        return "Chiffres uniquement";
    }
    if (is_float($name)) {
        return "Chiffres ronds uniquement";
    }
}

function validate_login_admin($login, $password)
{
    $query = pdo()->prepare("SELECT * FROM user WHERE email = ? AND rank_id = 3");
    $query->execute([$login]);
    $admin = $query->fetch();
    if ($admin && password_verify($password, $admin->password)) {
        session()->set('admin', $admin);
        session()->set('user', $admin);
        $admin->genre == 'Homme' ? $connectedGenre = 'connecté' : $connectedGenre = 'connectée';
        flash_success("Bonjour et bienvenue <b>$admin->firstname</b>, vous êtes " . $connectedGenre);
        save_inputs();
        redirect(ADMIN_DASHBOARD);
    } else {
        $_SESSION['errors']['credentials'] = 'Identifiants incorrects';
        flash_warning($_SESSION['errors']['credentials']);
        save_inputs();
        redirect(ADMIN_LOGIN);
    }
}

function validate_login_user($login, $password)
{
    $query = pdo()->prepare("SELECT * FROM user WHERE email = ?");
    $query->execute([$login]);
    $user = $query->fetch();
    if ($user && password_verify($password, $user->password)) {
        session()->set('user', $user);
        // if user is an admin, also create admin array in session
        if ($user->rank_id == 3) {
            session()->set('admin', $user);
        }
        $user->genre == 'Homme' ? $connectedGenre = 'connecté' : $connectedGenre = 'connectée';
        flash_success("Bonjour <b>{$user->firstname}</b>, vous êtes " . $connectedGenre);
        save_inputs();
        redirect(PUBLIC_HOME);
    } else {
        flash_warning("Identifiants incorrects");
        save_inputs();
        redirect(USER_LOGIN);
    }
}

function validateAge($birthday, $age)
{
    if (is_string($birthday)) {
        $birthday = strtotime($birthday);
    }
    // 31556926 is the number of seconds in a 365 days year.
    if (time() - $birthday > $age * 31556926)  {
        return false;
    }
    return true;
}

function validate_update_user_info($email, $user)
{
    if ($email == $user->email) {
        validate([
            'firstname' => ['required', 'name'],
            'lastname' => ['required', 'name'],
            'genre_id' => ['required'],
            'birthdate' => ['birthdate'],
            'divinglevel_id' => ['required'],
            'rank_id' => ['required']
        ]);
    } elseif ($email != $user->email) {
        validate([
            'firstname' => ['required', 'name'],
            'lastname' => ['required', 'name'],
            'genre_id' => ['required'],
            'birthdate' => ['birthdate'],
            'email' => ['required', 'email'],
            'divinglevel_id' => ['required'],
            'rank_id' => ['required']
        ]);
    }
}
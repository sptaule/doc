<?php

use duncan3dc\Laravel\BladeInstance;

require '../../bootstrap.php';
require '../../vendor/autoload.php';

if (is_file(BASE_PATH . DIRECTORY_SEPARATOR . 'config.php')) {
    flash_danger("L'installation de <b>Scuba</b> a déjà été effectuée.<br>Si vous devez modifier des informations critiques, contacter l'administrateur.");
    redirect(ADMIN_DASHBOARD);
}

$success = false;

if (is_post()) {

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

    if ($_POST['password'] != $_POST['password_conf']) {
        flash_warning("Les mots de passe ne sont pas identiques"); save_inputs(); redirect_self();
    }
    // Check if user set an avatar
    if ($_FILES['images']['name'][0] == '') {
        flash_warning("Vous devez choisir le logo du club"); save_inputs(); redirect_self();
    }

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $db_host = $_POST['db_host'];
    $db_name = $_POST['db_name'];
    $db_username = $_POST['db_username'];
    $db_password = $_POST['db_password'];

    // Process club logo and save it in different sizes
    foreach ($_FILES['images']['tmp_name'] as $image) {
        Picture::upload_photo($image, "/ressources/images/club/logo/", ['small', 'medium'], 'logo');
    }

    // Verify database credentials for real
    try {
        $dbh = new pdo("mysql:host=$db_host;dbname=$db_name",
            $db_username,
            $db_password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $success = true;
    } catch (PDOException $ex) {
        flash_danger("Vérifiez les informations de connexion à la base de données"); save_inputs(); redirect_self();
    }

    // ==> If everything ready to install
    if ($success === true) {
        var_dump("Super !");
    }
}

$blade = new BladeInstance(BASE_PATH . "/views", BASE_PATH . "/cache/views");
echo $blade->render("admin.sections.specials.setup");
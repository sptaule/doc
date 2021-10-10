<?php

namespace App\Controllers;

use App\Libs\Picture;
use duncan3dc\Laravel\BladeInstance;
use PDO;
use PDOException;
use Symfony\Component\Routing\RouteCollection;

class SetupController
{
    public function start(RouteCollection $routes)
    {
        $success = false;
        $cfgFile = BASE_PATH . DIRECTORY_SEPARATOR . 'config/core.php';

        /** If `config/core.php` already defined and MySQL settings have already been set, redirect user */
        if (
            str_contains(file_get_contents($cfgFile), "DB_HOST")
            && str_contains(file_get_contents($cfgFile), "DB_NAME")
            && str_contains(file_get_contents($cfgFile), "DB_USERNAME")
            && str_contains(file_get_contents($cfgFile), "DB_PASSWORD")
        ) {
            flash_danger("L'installation de <b>Scuba</b> a déjà été effectuée. Si vous souhaitez modifier des informations critiques, contactez son créateur : contact@lucaschaplain.design");
            redirect(ADMIN_DASHBOARD);
        }

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

            /** Check if user has set an avatar */
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

            /** Process club logo and save it in different sizes */
            foreach ($_FILES['images']['tmp_name'] as $image) {
                Picture::upload_photo($image, "/ressources/images/club/logo/", ['small', 'medium'], 'logo');
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
            $sqlFiles = glob(BASE_PATH . "/sql/*.sql");
            foreach ($sqlFiles as $sqlFile) {
                $sqlData = file_get_contents($sqlFile);
                $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $query = $pdo->prepare($sqlData);
                $query->execute();
            }

            $success = true;

            /** If successful installation */
            if ($success === true) {
                flash_success("Installation réussie !<br>Bienvenue sur l'interface administrateur de <b>Scuba</b>.");
                redirect(ADMIN_DASHBOARD);
            }
        }

        /** Send Setup view */
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.specials.setup");
    }
}
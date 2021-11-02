<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class AuthController
{
    public function loginAdmin(RouteCollection $routes)
    {
        if (is_admin_connected()) {
            flash_warning("Votre compte est déjà connecté");
            redirect(ADMIN_DASHBOARD);
        }
        if (is_post()) {
            validate([
                'email' => ['required'],
                'password' => ['required']
            ]);
            validate_login_admin(sanitize($_POST['email']), $_POST['password']);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.specials.login", ['title' => "Connexion administrateur"]);
    }

    public function loginUser(RouteCollection $routes)
    {
        if (is_connected()) {
            flash_warning("Votre compte est déjà connecté");
            redirect(PUBLIC_HOME);
        }
        if (is_post()) {
            validate([
                'email' => ['required'],
                'password' => ['required']
            ]);
            validate_login_user(sanitize($_POST['email']), $_POST['password']);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.login", ['title' => "Connexion"]);
    }

    public function logout(RouteCollection $routes)
    {
        if (!is_connected()) {
            flash_warning("Vous n'êtes pas connecté(e)");
            redirect(USER_LOGIN);
        }
        if (session()->has('user')) {
            $currentAuthUser = 'user';
        } elseif (session()->has('admin')) {
            $currentAuthUser = 'admin';
        } else {
            $currentAuthUser = null;
        }
        if (!is_null($currentAuthUser)) {
            session()->get($currentAuthUser)->genre == 'Homme' ? $connectedGenre = "déconnecté" : $connectedGenre = "déconnectée";
            session()->remove($currentAuthUser);
            session()->invalidate();
            flash_success("Vous êtes à présent " . $connectedGenre . ", à bientôt <b>" . session()->get($currentAuthUser)->firstname . "</b>");
            if ($currentAuthUser == 'admin') {
                redirect(ADMIN_LOGIN);
            } elseif ($currentAuthUser == 'user') {
                redirect(USER_LOGIN);
            }
        }
    }
}
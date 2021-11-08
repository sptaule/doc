<?php

namespace App\Controllers;

use App\Models\DivingLevel;
use App\Models\Scuba;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use App\Models\User;

class UserController
{
    /** Admin */

    public function list(RouteCollection $routes)
    {
        admin_required();
        $users = User::getAll('last_connection DESC');
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._users.index",
            [
                'title' => 'Liste des utilisateurs',
                'users' => $users,
            ]);
    }

    public function add(RouteCollection $routes)
    {
        admin_required();
        $genres = User::getGenres();
        $divingLevels = DivingLevel::getAll();
        if (is_post()) {
            var_dump($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._users.add",
        [
            'title' => 'Ajouter un utilisateur',
            'genres' => $genres,
            'divingLevels' => $divingLevels,
        ]);
    }

    public function register(RouteCollection $routes)
    {
        // Send account confirmation link
        $subject = "Test d'envoi d'email";
        if (is_post()) {
            User::register($_POST);
            /* Scuba::send_mail(
                $subject,
                partialMail('AccountValidation', ['tokenLink' => random_str(64)]),
                ['lecas83@gmail.com']
            ); */
        }
        if (is_connected()) {
            flash_warning("Votre compte est déjà connecté");
            redirect(PUBLIC_HOME);
        }
        $genres = User::getGenres();
        $divingLevels = DivingLevel::getAll();
        $skills = User::getSkills();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.register",
        [
            'title' => 'Inscription',
            'genres' => $genres,
            'divingLevels' => $divingLevels,
            'skills' => $skills,
        ]);
    }

    /** Authenticated user */

    public function dashboard(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
        [
            'title' => 'Tableau de bord',
        ]);
    }

    public function dashboardProfile(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardLicence(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardCertificate(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Certificat',
            ]);
    }

    public function dashboardMembership(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardOrders(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardBubble(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardInbox(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardAlbums(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

    public function dashboardSettings(RouteCollection $routes)
    {
        require_connected();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._user.dashboard.index",
            [
                'title' => 'Tableau de bord',
            ]);
    }

}
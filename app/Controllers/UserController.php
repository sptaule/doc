<?php

namespace App\Controllers;

use App\Models\DivingLevel;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;
use App\Models\User;

class UserController
{
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
        if (is_post()) {
            User::register($_POST);
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
}
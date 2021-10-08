<?php

namespace App\Controllers\Admin;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;
use App\Models\User;

class UserController
{
    public function list(RouteCollection $routes)
    {
        $query = pdo()->prepare("SELECT * FROM admin");
        $query->execute();
        $admins = $query->fetchAll();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._users.index", ['title' => 'Liste des utilisateurs', 'admins' => $admins]);
    }

    public function add(RouteCollection $routes)
    {
        $genres = User::getGenres();
        if (is_post()) {
            var_dump($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._users.add", ['title' => 'Ajouter un utilisateur', 'genres' => $genres]);
    }
}
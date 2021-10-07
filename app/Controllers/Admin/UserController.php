<?php

namespace App\Controllers\Admin;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class UserController
{
    public function list(RouteCollection $routes)
    {
        $query = pdo()->prepare("SELECT * FROM admins");
        $query->execute();
        $admins = $query->fetchAll();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._users.index", ['admins' => $admins]);
    }
}
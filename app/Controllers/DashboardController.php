<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class DashboardController
{
    public function index(RouteCollection $routes)
    {
        admin_required();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static.index", ['title' => "Tableau de bord"]);
    }
}
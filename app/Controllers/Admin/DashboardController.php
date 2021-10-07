<?php

namespace App\Controllers\Admin;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class DashboardController
{
    public function index(RouteCollection $routes)
    {
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.sections.static.index");
    }
}
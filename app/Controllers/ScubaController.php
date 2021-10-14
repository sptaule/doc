<?php

namespace App\Controllers;

use App\Models\Scuba;
use App\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class ScubaController
{
    public function setup(RouteCollection $routes)
    {
        if (is_post()) {
            if (Scuba::deploy($_POST)) {
                flash_success("Installation réussie !<br>Bienvenue sur l'interface administrateur de <b>Scuba</b>.");
                redirect(ADMIN_DASHBOARD);
            }
        }
        $genres = User::getGenres();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.specials.setup", ['genres' => $genres]);
    }
}
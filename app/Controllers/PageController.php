<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
    public function indexAction(RouteCollection $routes)
    {
        if (is_post()) {
            dump($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.sections.static.index");
    }
}
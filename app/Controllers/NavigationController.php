<?php

namespace App\Controllers;

use App\Models\Navigation;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class NavigationController
{
    public function home(RouteCollection $routes)
    {
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("static._pages.home");
    }

    public function page(RouteCollection $routes, $pageSlug)
    {
        $page = Navigation::getPageBySlug($pageSlug);
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        if ($page)
            echo $blade->render("static._pages.home");
        else
            echo $blade->render("errors.404");
    }
}
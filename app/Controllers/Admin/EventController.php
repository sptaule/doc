<?php

namespace App\Controllers\Admin;

use App\Models\Event;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class EventController
{
    public function listTypes(RouteCollection $routes)
    {
        $types = Event::getTypes();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._events.types.index",
            [
                'title' => "Liste des types d'évènements",
                'types' => $types
            ]);
    }

    public function addType(RouteCollection $routes)
    {
        if (is_post()) {
            Event::addType($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._settings.diving_levels.add",
            [
                'title' => 'Ajouter un niveau de plongée'
            ]);
    }
}
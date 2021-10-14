<?php

namespace App\Controllers;

use App\Models\Event;
use App\Models\Scuba;
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
            "admin.static._events.types.add",
            [
                'title' => "Ajouter un type d'évènement"
            ]);
    }

    public function editType(int $id, RouteCollection $routes)
    {
        if (is_post()) {
            dd(Scuba::formatColor($_POST['color'], false));
            Event::editType($_POST);
        }
        $type = Event::getType($id);
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._events.types.edit",
            [
                'title' => "Modifier un type d'évènement",
                'type' => $type
            ]);
    }
}
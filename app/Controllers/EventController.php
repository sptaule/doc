<?php

namespace App\Controllers;

use App\Models\Document;
use App\Models\Event;
use App\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class EventController
{
    public function listTypes(RouteCollection $routes)
    {
        admin_required();
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
        admin_required();
        if (is_post()) {
            Event::addType($_POST);
        }
        $documents = Document::getAll('id');
        $ranks = User::getRanks();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._events.types.add",
            [
                'title' => "Ajouter un type d'évènement",
                'documents' => $documents,
                'ranks' => $ranks
            ]);
    }

    public function editType(int $id, RouteCollection $routes)
    {
        admin_required();
        if (is_post()) {
            Event::editType($_POST, $id);
        }
        $type = Event::getType($id);
        $documents = Document::getAll('id');
        $typeDocuments = Document::getTypeDocuments($id);
        $typeRanks = Document::getTypeRanks($id);
        $ranks = User::getRanks();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._events.types.edit",
            [
                'title' => "Modifier le type : <b>$type->name</b>",
                'type' => $type,
                'documents' => $documents,
                'ranks' => $ranks,
                'typeDocuments' => $typeDocuments,
                'typeRanks' => $typeRanks
            ]);
    }

    public static function deleteType(int $id, RouteCollection $routes)
    {
        admin_required();
        Event::deleteType($id);
    }
}
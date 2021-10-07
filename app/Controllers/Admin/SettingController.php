<?php

namespace App\Controllers\Admin;


use App\Models\DivingLevel;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;


class SettingController
{
    public function listDivingLevels(RouteCollection $routes)
    {
        $divingLevels = DivingLevel::getAll();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._settings.diving_levels.index",
            [
                'title' => 'Liste des niveaux de plongée',
                'divingLevels' => $divingLevels
        ]);
    }

    public function addDivingLevel(RouteCollection $routes)
    {
        if (is_post()) {
            DivingLevel::add($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._settings.diving_levels.add",
            [
                'title' => 'Ajouter un niveau de plongée'
        ]);
    }
}
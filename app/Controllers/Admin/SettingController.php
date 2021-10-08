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

    public function editDivingLevel(int $id, RouteCollection $routes)
    {
        if (is_post()) {
            DivingLevel::edit($_POST, $id);
        }
        $divingLevel = DivingLevel::get($id);
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
            "admin.static._settings.diving_levels.edit",
            [
                'title' => 'Modifier un niveau de plongée',
                'divingLevel' => $divingLevel
            ]);
    }

    public function sortDivingLevels(RouteCollection $routes)
    {
        if (is_post(false)) {
            $index = 0;
            foreach ($_POST['item'] as $item) {
                $query = pdo()->prepare("UPDATE diving_level SET position = ? WHERE id = ?");
                $query->execute([$index + 1, $item]);
                $index++;
            }
            flash_success("L'ordre a été modifié");
            echo 1;
        }
    }
}
<?php

namespace App\Controllers;

use App\Models\Navigation;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class AppearanceController
{
    /** OPTIONS / CUSTOMIZATION */

    public function customization(RouteCollection $routes)
    {
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._appearance.customization.index",
        [
            'title' => "Personnaliser l'apparence du site"
        ]);
    }

    /** EDITOR */

    public function editorImageUpload(RouteCollection $routes)
    {
        define("UPLOADDIR", BASE_PATH .  "/public/upload/content/pages");
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $file = array_shift($_FILES);
            $imgName = random_str(12);
            if (move_uploaded_file($file['tmp_name'], UPLOADDIR . "/" . $imgName . '.' . pathinfo($file['name'], PATHINFO_EXTENSION))) {
                $file = '/upload/content/pages/' . $imgName . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                $data = array(
                    'success' => true,
                    'file' => $file,
                );
            } else {
                $data = array(
                    'message' => 'uploadError',
                );
            }
        } else {
            $data = array(
                'message' => 'uploadNotAjax',
                'formData' => $_POST
            );
        }
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }

}
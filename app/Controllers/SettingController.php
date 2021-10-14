<?php

namespace App\Controllers;


use App\Models\Club;
use App\Models\DivingLevel;
use App\Models\Document;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;


class SettingController
{
    /*
    * DIVING LEVELS
     */

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

    /**
     * @param int $id The diving level to delete
     * @param RouteCollection $routes
     * Delete a diving level and rearrange the positions.
     */
    public function deleteDivingLevel(int $id, RouteCollection $routes)
    {
        // Get selected diving level position
        $position = DivingLevel::getPosition($id);

        // Rearrange diving levels position
        $divingLevels = DivingLevel::getAll('position', "position > $position");
        foreach ($divingLevels as $divingLevel) {
            $query = pdo()->prepare("UPDATE diving_level SET position = position - 1 WHERE id = ?");
            $query->execute([$divingLevel->id]);
        }

        /*
         * TODO
         * Vérifier si un évènement possède comme niveau minimum celui qui a été supprimé
         * et modifier son niveau minimum à celui en-dessous ou au-dessus
         */

        // Delete selected diving level
        DivingLevel::delete($id);

        echo 1;
    }

    /*
    * DOCUMENTS
    */

    public function listDocuments(RouteCollection $routes)
    {
        $documents = Document::getAll();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._settings.documents.index",
        [
            'title' => 'Liste des documents requis',
            'documents' => $documents
        ]);
    }

    public static function addDocument(RouteCollection $routes)
    {
        if (is_post()) {
            Document::add($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._settings.documents.add",
        [
            'title' => 'Ajouter un document'
        ]);
    }

    public function editDocument(int $id, RouteCollection $routes)
    {
        if (is_post()) {
            Document::edit($_POST, $id);
        }
        $document = Document::get($id);
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._settings.documents.edit",
        [
            'title' => "Modifier un document : <b>$document->name</b>",
            'document' => $document
        ]);
    }

    /**
     * @param int $id The document to delete
     * @param RouteCollection $routes
     * Delete a document.
     */
    public function deleteDocument(int $id, RouteCollection $routes)
    {
        /*
         * TODO
         * Vérifier si un type d'évènement est limité par ce document
         * si oui, le retirer de la table `type_document`
         */

        // Delete selected diving level
        Document::delete($id);
        echo 1;
    }

    /*
    * CLUB
    */

    public function clubInfo(RouteCollection $routes)
    {
        if (is_post()) {
            Club::updateInfos($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._settings.club.index",
        [
            'title' => "Informations du club",
            'clubName' => Club::getValue('club_name'),
            'clubDescription' => Club::getValue('club_description'),
            'superUserFirstname' => Club::getValue('super_user_firstname'),
            'superUserLastname' => Club::getValue('super_user_lastname'),
            'superUserEmail' => Club::getValue('super_user_email'),
            'allowRegistrations' => Club::getValue('allow_registrations'),
            'dateFormat' => Club::getValue('date_format'),
            'timeFormat' => Club::getValue('time_format')
        ]);
    }

}
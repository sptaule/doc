<?php

namespace App\Models;

use Symfony\Component\Routing\RouteCollection;

class Event
{
    public static function getTypes(string $orderBy = 'name', string $where = null): bool|array
    {
        if (is_null($where)) {
            $query = pdo()->prepare("SELECT * FROM event_type ORDER BY {$orderBy}");
        } else {
            $query = pdo()->prepare("SELECT * FROM event_type WHERE {$where} ORDER BY {$orderBy}");
        }
        $query->execute();
        return $query->fetchAll();
    }

    public static function getType(int $id): object
    {
        $query = pdo()->prepare("SELECT * FROM event_type WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function addType($data)
    {
        validate([
            'name' => ['required', "unique:event_type:name"],
            'color' => ['required', 'min:7', 'max:7'],
        ]);

        /** Basic infos */
        $name = sanitize($data['name']);
        $color = sanitize(Scuba::formatColor($data['color'], false));
        $charge = isset($data['charge']) ? 1 : 0;
        $query = pdo()->prepare("INSERT INTO event_type (name, color, charge) VALUES (?, ?, ?)");
        $query->execute([$name, $color, $charge]);
        $eventTypeId = pdo()->lastInsertId();

        /** Documents and ranks checkboxes */
        // Documents
        $documents = Document::getAll();
        foreach ($documents as $document) {
            // If at least on checkbox is checked
            isset($data['documents'])
                ? isset($data['documents'][$document->id])
                    ? $value = 1
                    : $value = 0
                : $value = 0;
            $query = pdo()->prepare("INSERT INTO event_type_document (event_type_id, document_id, value) VALUES (?, ?, ?)");
            $query->execute([$eventTypeId, $document->id, $value]);
        }
        // Ranks
        $ranks = User::getRanks();
        foreach ($ranks as $rank) {
            // If at least on checkbox is checked
            isset($data['ranks'])
                ? isset($data['ranks'][$rank->rank_id])
                    ? $value = 1
                    : $value = 0
                : $value = 0;
            $query = pdo()->prepare("INSERT INTO event_type_rank (event_type_id, rank_id, value) VALUES (?, ?, ?)");
            $query->execute([$eventTypeId, $rank->rank_id, $value]);
        }
        flash_success("Le type <b>$name</b> a été créé");
        redirect(ADMIN_EVENT_TYPES);
    }

    public static function editType($data, int $id)
    {
        validate([
            'name' => ['required', "unique_exception:event_type:name:$id"],
            'color' => ['required', 'min:7', 'max:7'],
        ]);

        /** Documents and ranks checkboxes */

        // Reset all to 0
        $query = pdo()->prepare("UPDATE event_type_document SET value = 0 WHERE event_type_id = ?");
        $query->execute([$id]);
        $query = pdo()->prepare("UPDATE event_type_rank SET value = 0 WHERE event_type_id = ?");
        $query->execute([$id]);
        // Recheck the ones checked if any
        if (isset($data['documents'])) {
            foreach ($data['documents'] as $documentId => $document) {
                $query = pdo()->prepare("UPDATE event_type_document SET value = 1 WHERE document_id = ? AND event_type_id = ?");
                $query->execute([$documentId, $id]);
            }
        }
        if (isset($data['ranks'])) {
            foreach ($data['ranks'] as $rankId => $rank) {
                $query = pdo()->prepare("UPDATE event_type_rank SET value = 1 WHERE rank_id = ? AND event_type_id = ?");
                $query->execute([$rankId, $id]);
            }
        }

        /** Basic infos */

        $name = sanitize($data['name']);
        $color = sanitize(Scuba::formatColor($data['color'], false));
        $charge = isset($data['charge']) ? 1 : 0;
        $query = pdo()->prepare("UPDATE event_type SET name = ?, color = ?, charge = ? WHERE id = ?");
        $success = $query->execute([$name, $color, $charge, $id]);

        $success === true
            ? flash_success("Le type <b>$name</b> a été modifié")
            : flash_warning("Erreur lors de la modification");
        redirect(ADMIN_EVENT_TYPES);
    }

    public static function deleteType(int $id)
    {
        /** Delete rows in event_type_document and event_type_rank */
        $query = pdo()->prepare("DELETE FROM event_type_document WHERE event_type_id = ?");
        $query->execute([sanitize($id)]);
        $query = pdo()->prepare("DELETE FROM event_type_rank WHERE event_type_id = ?");
        $query->execute([sanitize($id)]);

        /** Delete row in event_type */
        $query = pdo()->prepare("DELETE FROM event_type WHERE id = ?");
        $query->execute([sanitize($id)]);

        // Send AJAX response
        echo 1;
    }
}
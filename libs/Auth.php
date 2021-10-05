<?php

function is_connected()
{
    if (isset($_SESSION['user'])) return true; else return false;
}

function forbid_if_not_admin()
{
    if (!isset($_SESSION['admin'])) {
        flash_warning("
            Vous n'avez pas l'autorisation d'accéder à cette page<br>
            Toutefois, connectez-vous si vous êtes administrateur
        ");
        redirect("/admin/login.php");
    }
}

function forbid_if_not_connected()
{
    if (!isset($_SESSION['user'])) {
        flash_danger("Vous devez être connecté pour accéder à cette page");
        redirect("/user/login");
    }
}

function maintenance_status(): bool
{
    $query = pdo()->prepare("SELECT status FROM global_options WHERE name = ?"); $query->execute(['maintenance']);
    return boolval($query->fetch()->status);
}
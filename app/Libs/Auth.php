<?php

function is_admin_connected(): bool
{
    if (session()->has('admin') && session()->get('admin')->rank_id == 3) {
        return true;
    } else {
        return false;
    }
}

function admin_required()
{
    if (!is_admin_connected()) {
        flash_warning("Page accessible pour les administrateurs<br>Connectez-vous si vous êtes administrateur");
        redirect(ADMIN_LOGIN);
    }
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
<?php

function is_connected(): bool
{
    if (session()->has('admin') || session()->has('user')) {
        return true;
    } else {
        return false;
    }
}

function require_connected()
{
    if (!is_connected()) {
        flash_warning("Vous devez être connecté(e) pour voir cette page");
        redirect(USER_LOGIN);
    }
}

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
        flash_warning("
            Page accessible pour les administrateurs<br>
            Connectez-vous si vous êtes administrateur
        ");
        redirect(ADMIN_LOGIN);
    }
}

function is_director_connected(): bool
{
    if (session()->has('user') && session()->get('user')->rank_id == 2) {
        return true;
    } else {
        return false;
    }
}

function director_required()
{
    if (!is_director_connected()) {
        flash_warning("
            Page accessible pour les directeurs de plongée et administrateurs<br>
            Connectez-vous si vous êtes directeur de plongée ou administrateur
        ");
        redirect(USER_LOGIN);
    }
}

function is_member_connected(): bool
{
    if (session()->has('user') && session()->get('user')->rank_id == 1) {
        return true;
    } else {
        return false;
    }
}

function member_required()
{
    if (!is_member_connected()) {
        flash_warning("
            Page accessible pour les membres<br>
            Connectez-vous si vous êtes membre
        ");
        redirect(USER_LOGIN);
    }
}
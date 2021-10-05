<?php

class Flash
{
    public $type;
    public $message;
}

function flash_success($message)
{
    flash('success', $message);
}

function flash_warning($message)
{
    flash('warning', $message);
}

function flash_danger($message)
{
    flash('danger', $message);
}

function flash($type, $message)
{
    $_SESSION['flash'] = compact('type', 'message');
}

function get_flash()
{
    $flash = $_SESSION['flash'] ?? null;
    $_SESSION['flash'] = null;
    return $flash;
}

function flash_data($key, $value)
{
    $_SESSION['flash_data'] = $_SESSION['flash_data'] ?? [];
    $_SESSION['flash_data'][$key] = $value;
}

function get_flash_data($key)
{
    $value = $_SESSION['flash_data'][$key] ?? null;
    $_SESSION['flash_data'][$key] = null;
    return $value;
}
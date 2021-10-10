<?php

use duncan3dc\Laravel\BladeInstance;

// Require core config and necessary functions
require_once 'config/core.php';
require_once 'config/functions.php';

if (DEBUG === true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

session_start();

/** CSRF_TOKEN */
$_SESSION['CSRF_TOKEN'] = $_SESSION['CSRF_TOKEN'] ?? random_str();

// require libs that are required on almost/every page
import("Auth");
import('Flash');
import('Database');
import('Routes');
import('Validation');
import('Picture');
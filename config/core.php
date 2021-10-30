<?php

/**
* ======================================
* ==== Base configuration for Scuba ====
* ======================================
*/

/** Absolute directories paths. */
define('BASE_PATH', str_replace("\\", "/", dirname(__DIR__)));
define('APP_PATH', str_replace("\\", "/", dirname(__DIR__)) . '/app');

/** Enable or disable the display of notices. */
const DEBUG = true;

/**
* --------------
* MySQL settings
* --------------
*/
const DB_HOST = 'localhost';
const DB_NAME = 'scuba';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'apozpoepo';

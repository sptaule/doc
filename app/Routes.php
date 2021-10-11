<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/* * * * *
* * * SETUP ROUTES
* * * * */

$path = '/setup';
$routes->add('scubaSetup', new Route($path, ['controller' => 'SetupController', 'method' => 'start']));
define("SCUBA_SETUP", $path);

/* * * * *
* * * ADMIN ROUTES
* * * * */

// * DASHBOARD

$path = '/admin';
$routes->add('adminDashboard', new Route($path, ['controller' => 'Admin\DashboardController', 'method' => 'index']));
define("ADMIN_DASHBOARD", $path);

// ** USERS

$path = '/admin/users';
$routes->add('adminUsersList', new Route($path, ['controller' => 'Admin\UserController', 'method' => 'list'], ['id' => '[0-9]+']));
define("ADMIN_USERS", $path);

$path = '/admin/users/add';
$routes->add('adminUsersAdd', new Route($path, ['controller' => 'Admin\UserController', 'method' => 'add']));
define("ADMIN_USERS_ADD", $path);

$path = '/admin/users/edit/{id}';
$routes->add('adminUsersEdit', new Route($path, ['controller' => 'Admin\UserController', 'method' => 'add']));
define("ADMIN_USERS_EDIT", str_replace("{id}", "", $path));

// ** EVENTS

$path = '/admin/events/types';
$routes->add('adminEventTypes', new Route($path, ['controller' => 'Admin\EventController', 'method' => 'listTypes']));
define("ADMIN_EVENT_TYPES", $path);

$path = '/admin/events/type/add';
$routes->add('adminEventTypeAdd', new Route($path, ['controller' => 'Admin\EventController', 'method' => 'addType']));
define("ADMIN_EVENT_TYPE_ADD", $path);

// ** SETTINGS

$path = '/admin/diving-levels';
$routes->add('adminDivingLevelsList', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'listDivingLevels']));
define("ADMIN_DIVING_LEVELS", $path);

$path = '/admin/diving-level/add';
$routes->add('adminDivingLevelAdd', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'addDivingLevel']));
define("ADMIN_DIVING_LEVEL_ADD", $path);

$path = '/admin/diving-level/edit/{id}';
$routes->add('adminDivingLevelEdit', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'editDivingLevel']));
define("ADMIN_DIVING_LEVEL_EDIT", str_replace("{id}", "", $path));

$path = '/admin/diving-levels/sort';
$routes->add('adminDivingLevelsSort', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'sortDivingLevels']));
define("ADMIN_DIVING_LEVELS_SORT", $path);

$path = '/admin/diving-level/delete/{id}';
$routes->add('adminDivingLevelDelete', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'deleteDivingLevel']));
define("ADMIN_DIVING_LEVEL_DELETE", $path);


$path = '/admin/documents';
$routes->add('adminDocumentsList', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'listDocuments']));
define("ADMIN_DOCUMENTS", $path);

$path = '/admin/document/add';
$routes->add('adminDocumentAdd', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'addDocument']));
define("ADMIN_DOCUMENT_ADD", $path);

$path = '/admin/document/edit/{id}';
$routes->add('adminDocumentEdit', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'editDocument']));
define("ADMIN_DOCUMENT_EDIT", str_replace("{id}", "", $path));

$path = '/admin/document/delete/{id}';
$routes->add('adminDocumentDelete', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'deleteDocument']));
define("ADMIN_DOCUMENT_DELETE", $path);

$path = '/admin/club';
$routes->add('adminClub', new Route($path, ['controller' => 'Admin\SettingController', 'method' => 'getInfo']));
define("ADMIN_CLUB", $path);
<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/* * * * *
* * * SETUP ROUTES
* * * * */

$path = '/setup';
$routes->add('scubaSetup', new Route($path, ['controller' => 'ScubaController', 'method' => 'setup']));
define("SCUBA_SETUP", $path);

/* * * * *
* * * ADMIN ROUTES
* * * * */

// * DASHBOARD

$path = '/admin';
$routes->add('adminDashboard', new Route($path, ['controller' => 'DashboardController', 'method' => 'index']));
define("ADMIN_DASHBOARD", $path);

// ** USERS

$path = '/admin/users';
$routes->add('adminUsersList', new Route($path, ['controller' => 'UserController', 'method' => 'list']));
define("ADMIN_USERS", $path);

$path = '/admin/user/add';
$routes->add('adminUsersAdd', new Route($path, ['controller' => 'UserController', 'method' => 'add']));
define("ADMIN_USER_ADD", $path);

$path = '/admin/user/view/{id}';
$routes->add('adminUserView', new Route($path, ['controller' => 'UserController', 'method' => 'view'], ['id' => '[0-9]+']));
define("ADMIN_USER_VIEW", str_replace("{id}", "", $path));

$path = '/admin/user/edit/{id}';
$routes->add('adminUserEdit', new Route($path, ['controller' => 'UserController', 'method' => 'add'], ['id' => '[0-9]+']));
define("ADMIN_USER_EDIT", str_replace("{id}", "", $path));

// ** EVENTS

$path = '/admin/events/types';
$routes->add('adminEventTypes', new Route($path, ['controller' => 'EventController', 'method' => 'listTypes']));
define("ADMIN_EVENT_TYPES", $path);

$path = '/admin/events/type/add';
$routes->add('adminEventTypeAdd', new Route($path, ['controller' => 'EventController', 'method' => 'addType']));
define("ADMIN_EVENT_TYPE_ADD", $path);

$path = '/admin/events/type/edit/{id}';
$routes->add('adminEventTypeEdit', new Route($path, ['controller' => 'EventController', 'method' => 'editType'], ['id' => '[0-9]+']));
define("ADMIN_EVENT_TYPE_EDIT", str_replace("{id}", "", $path));

// ** SETTINGS

$path = '/admin/diving-levels';
$routes->add('adminDivingLevelsList', new Route($path, ['controller' => 'SettingController', 'method' => 'listDivingLevels']));
define("ADMIN_DIVING_LEVELS", $path);

$path = '/admin/diving-level/add';
$routes->add('adminDivingLevelAdd', new Route($path, ['controller' => 'SettingController', 'method' => 'addDivingLevel']));
define("ADMIN_DIVING_LEVEL_ADD", $path);

$path = '/admin/diving-level/edit/{id}';
$routes->add('adminDivingLevelEdit', new Route($path, ['controller' => 'SettingController', 'method' => 'editDivingLevel']));
define("ADMIN_DIVING_LEVEL_EDIT", str_replace("{id}", "", $path));

$path = '/admin/diving-levels/sort';
$routes->add('adminDivingLevelsSort', new Route($path, ['controller' => 'SettingController', 'method' => 'sortDivingLevels']));
define("ADMIN_DIVING_LEVELS_SORT", $path);

$path = '/admin/diving-level/delete/{id}';
$routes->add('adminDivingLevelDelete', new Route($path, ['controller' => 'SettingController', 'method' => 'deleteDivingLevel']));
define("ADMIN_DIVING_LEVEL_DELETE", $path);


$path = '/admin/documents';
$routes->add('adminDocumentsList', new Route($path, ['controller' => 'SettingController', 'method' => 'listDocuments']));
define("ADMIN_DOCUMENTS", $path);

$path = '/admin/document/add';
$routes->add('adminDocumentAdd', new Route($path, ['controller' => 'SettingController', 'method' => 'addDocument']));
define("ADMIN_DOCUMENT_ADD", $path);

$path = '/admin/document/edit/{id}';
$routes->add('adminDocumentEdit', new Route($path, ['controller' => 'SettingController', 'method' => 'editDocument']));
define("ADMIN_DOCUMENT_EDIT", str_replace("{id}", "", $path));

$path = '/admin/document/delete/{id}';
$routes->add('adminDocumentDelete', new Route($path, ['controller' => 'SettingController', 'method' => 'deleteDocument']));
define("ADMIN_DOCUMENT_DELETE", $path);

$path = '/admin/club';
$routes->add('adminClub', new Route($path, ['controller' => 'SettingController', 'method' => 'clubInfo']));
define("ADMIN_CLUB", $path);
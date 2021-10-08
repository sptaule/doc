<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

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
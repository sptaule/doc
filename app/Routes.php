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

// * AUTH

$path = '/admin/login';
$routes->add('adminLogin', new Route($path, ['controller' => 'AuthController', 'method' => 'loginAdmin']));
define("ADMIN_LOGIN", $path);

$path = '/admin/logout';
$routes->add('adminLogout', new Route($path, ['controller' => 'AuthController', 'method' => 'logout']));
define("ADMIN_LOGOUT", $path);

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

$path = '/admin/events/type/delete/{id}';
$routes->add('adminEventTypeDelete', new Route($path, ['controller' => 'EventController', 'method' => 'deleteType']));
define("ADMIN_EVENT_TYPE_DELETE", $path);

// ** APPEARANCE

$path = '/admin/pages';
$routes->add('adminPages', new Route($path, ['controller' => 'NavigationController', 'method' => 'listPages']));
define("ADMIN_PAGES", $path);

$path = '/admin/page/add';
$routes->add('adminPageAdd', new Route($path, ['controller' => 'NavigationController', 'method' => 'addPage']));
define("ADMIN_PAGE_ADD", $path);

$path = '/admin/page/edit/{id}';
$routes->add('adminPageEdit', new Route($path, ['controller' => 'NavigationController', 'method' => 'editPage'], ['id' => '[0-9]+']));
define("ADMIN_PAGE_EDIT", str_replace("{id}", "", $path));

$path = '/admin/page/delete/{id}';
$routes->add('adminPageDelete', new Route($path, ['controller' => 'NavigationController', 'method' => 'deletePage']));
define("ADMIN_PAGE_DELETE", $path);

$path = '/admin/menus';
$routes->add('adminMenus', new Route($path, ['controller' => 'NavigationController', 'method' => 'listMenus']));
define("ADMIN_MENUS", $path);

$path = '/admin/menu/add';
$routes->add('adminMenuAdd', new Route($path, ['controller' => 'NavigationController', 'method' => 'addMenu']));
define("ADMIN_MENU_ADD", $path);

$path = '/admin/menu/edit/{id}';
$routes->add('adminMenuEdit', new Route($path, ['controller' => 'NavigationController', 'method' => 'editMenu'], ['id' => '[0-9]+']));
define("ADMIN_MENU_EDIT", str_replace("{id}", "", $path));

$path = '/admin/menu/delete/{id}';
$routes->add('adminMenuDelete', new Route($path, ['controller' => 'NavigationController', 'method' => 'deleteMenu']));
define("ADMIN_MENU_DELETE", $path);

$path = '/admin/customization';
$routes->add('adminCustomize', new Route($path, ['controller' => 'AppearanceController', 'method' => 'customization']));
define("ADMIN_CUSTOMIZATION", $path);

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

/* * * * *
* * * PUBLIC ROUTES
* * * * */

// * STATIC & DYNAMIC PAGES

// * ACCOUNT

$path = '/register';
$routes->add('register', new Route($path, ['controller' => 'UserController', 'method' => 'register']));
define("USER_REGISTER", $path);

// * AUTH

$path = '/user/login';
$routes->add('loginUser', new Route($path, ['controller' => 'AuthController', 'method' => 'loginUser']));
define("USER_LOGIN", $path);

$path = '/user/logout';
$routes->add('userLogout', new Route($path, ['controller' => 'AuthController', 'method' => 'logout']));
define("USER_LOGOUT", $path);

// * DASHBOARD

$path = '/user/dashboard';
$routes->add('userDashboard', new Route($path, ['controller' => 'UserController', 'method' => 'dashboard']));
define("USER_DASHBOARD", $path);

$path = '/user/profile';
$routes->add('userDashboardProfile', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardProfile']));
define("USER_DASHBOARD_PROFILE", $path);

$path = '/user/licence';
$routes->add('userDashboardLicence', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardLicence']));
define("USER_DASHBOARD_LICENCE", $path);

$path = '/user/certificate';
$routes->add('userDashboardCertificate', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardCertificate']));
define("USER_DASHBOARD_CERTIFICATE", $path);

$path = '/user/membership';
$routes->add('userDashboardMembership', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardMembership']));
define("USER_DASHBOARD_MEMBERSHIP", $path);

$path = '/user/orders';
$routes->add('userDashboardOrders', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardOrders']));
define("USER_DASHBOARD_ORDERS", $path);

$path = '/user/bubble';
$routes->add('userDashboardBubble', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardBubble']));
define("USER_DASHBOARD_BUBBLE", $path);

$path = '/user/inbox';
$routes->add('userDashboardInbox', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardInbox']));
define("USER_DASHBOARD_INBOX", $path);

$path = '/user/albums';
$routes->add('userDashboardAlbums', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardAlbums']));
define("USER_DASHBOARD_ALBUMS", $path);

$path = '/user/settings';
$routes->add('userDashboardSettings', new Route($path, ['controller' => 'UserController', 'method' => 'dashboardSettings']));
define("USER_DASHBOARD_SETTINGS", $path);

// * EDITOR

$path = '/editor/upload/image';
$routes->add('editorImageUpload', new Route($path, ['controller' => 'AppearanceController', 'method' => 'editorImageUpload']));
define("EDITOR_IMAGE_UPLOAD", $path);

$path = '/';
$routes->add('publicHome', new Route($path, ['controller' => 'NavigationController', 'method' => 'home']));
define("PUBLIC_HOME", $path);

$path = '/{pageSlug}';
$routes->add('publicPage', new Route($path, ['controller' => 'NavigationController', 'method' => 'page'],
    ['pageSlug' => '^[a-z0-9]+(?:-[a-z0-9]+)*$']));
define("PUBLIC_PAGE", str_replace("{pageSlug}", "", $path));

$path = '/{menuSlug}/{pageSlug}';
$routes->add('publicChildPage', new Route($path, ['controller' => 'NavigationController', 'method' => 'childPage'],
    array('menuSlug' => '^[a-z0-9]+(?:-[a-z0-9]+)*$', 'pageSlug' => '^[a-z0-9]+(?:-[a-z0-9]+)*$')));
define("PUBLIC_CHILD_PAGE", str_replace("{menuSlug}/{pageSlug}", "", $path));
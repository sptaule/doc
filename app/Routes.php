<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/* Admin Routes */

// Dashboard
$routes->add('adminDashboard', new Route('/admin/', ['controller' => 'Admin\DashboardController', 'method' => 'index'], ['id' => '[0-9]+']));
// Users
$routes->add('adminUsersList', new Route('/admin/users/', ['controller' => 'Admin\UserController', 'method' => 'list'], ['id' => '[0-9]+']));
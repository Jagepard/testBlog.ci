<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Blog\MaterialsController::index');
$routes->get('material/(:segment)', 'Blog\MaterialsController::item/$1');

$routes->get('admin', 'Admin\MaterialsController::materials');
$routes->get('admin/materials', 'Admin\MaterialsController::materials');
$routes->get('admin/material/add', 'Admin\MaterialsController::add');
$routes->post('admin/material/create', 'Admin\MaterialsController::create');
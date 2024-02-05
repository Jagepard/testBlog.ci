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
$routes->get('admin/material/edit/(:segment)', 'Admin\MaterialsController::edit/$1');
$routes->post('admin/material/update/(:segment)', 'Admin\MaterialsController::update/$1');
$routes->get('admin/material/delete', 'Admin\MaterialsController::delete');
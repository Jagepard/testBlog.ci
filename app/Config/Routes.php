<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Blog\MaterialsController::index');
$routes->get('material/(:segment)', 'Blog\MaterialsController::item/$1');

$routes->group('admin', ['filter' => 'session', 'group:admin,superadmin', 'permission:users.manage'], static function ($routes) {
    $routes->get('/', 'Admin\MaterialsController::materials');
    $routes->get('materials', 'Admin\MaterialsController::materials');
    $routes->get('material/add', 'Admin\MaterialsController::add');
    $routes->post('material/create', 'Admin\MaterialsController::create');
    $routes->get('material/edit/(:segment)', 'Admin\MaterialsController::edit/$1');
    $routes->post('material/update/(:segment)', 'Admin\MaterialsController::update/$1');
    $routes->get('material/delete', 'Admin\MaterialsController::delete');
    $routes->get('material/delimg', 'Admin\MaterialsController::imgDelete');
});

service('auth')->routes($routes);
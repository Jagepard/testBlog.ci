<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'Admin\Controllers', 'filter' => 'session', 'group:admin,superadmin', 'permission:users.manage'], static function ($routes) {
    $routes->get('/', 'MaterialsController::materials');
    $routes->get('materials', 'MaterialsController::materials');
    $routes->get('material/add', 'MaterialsController::add');
    $routes->post('material/create', 'MaterialsController::create');
    $routes->get('material/edit/(:segment)', 'MaterialsController::edit/$1');
    $routes->post('material/update/(:segment)', 'MaterialsController::update/$1');
    $routes->get('material/delete', 'MaterialsController::delete');
    $routes->get('material/delimg', 'MaterialsController::imgDelete');
});

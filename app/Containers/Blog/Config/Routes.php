<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('', ['namespace' => 'Blog\Controllers'], function($routes){
    $routes->get('/', 'MaterialsController::index');
    $routes->get('material/(:segment)', 'MaterialsController::item/$1');
});

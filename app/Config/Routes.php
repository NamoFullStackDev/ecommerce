<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->group('admin', function($routes) {
  $routes->get('products', 'Admin\ProductsController::index');
  $routes->get('products/new', 'Admin\ProductsController::new');
  $routes->post('products/create', 'Admin\ProductsController::create');
  $routes->get('products/delete/(:num)', 'Admin\ProductsController::delete/$1');
});
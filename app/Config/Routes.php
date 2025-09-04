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
  $routes->get('products/show/(:num)', 'Admin\ProductsController::show/$1');
});

$routes->get('products', 'ProductsController::index');
$routes->get('products/show/(:num)', 'ProductsController::show/$1');
$routes->post('products/addtocart/(:num)', 'ProductsController::addToCart/$1');
$routes->post('products/updatecart/(:num)', 'ProductsController::updateCart/$1');
$routes->get('cart', 'CartController::index');
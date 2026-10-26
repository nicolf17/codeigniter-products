<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', static fn () => redirect()->to('/products'));

$routes->get('products', 'ProductsController::index');
$routes->get('products/create', 'ProductsController::create');
$routes->post('products', 'ProductsController::store');
$routes->get('products/(:num)/edit', 'ProductsController::edit/$1');
$routes->post('products/(:num)', 'ProductsController::update/$1');
$routes->post('products/(:num)/delete', 'ProductsController::delete/$1');
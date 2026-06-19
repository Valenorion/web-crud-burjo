<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================== ROUTES AUTH (Tanpa Filter) ====================
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// ==================== ROUTES PUBLIC (Tanpa Filter) ====================
$routes->get('/', 'Home::index');
$routes->get('menu', 'MenuController::index');
$routes->get('about', 'AboutController::index');

// ==================== ROUTES ADMIN (Hanya Admin) ====================
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    // Dashboard utama
    $routes->get('dashboard', 'AdminController::dashboard');
    
    // ===== CRUD FOODS =====
    $routes->group('foods', function($routes) {
        $routes->get('', 'AdminController::foods');
        $routes->post('create', 'AdminController::createFood');
        $routes->post('edit/(:any)', 'AdminController::editFood/$1');
        $routes->get('delete/(:any)', 'AdminController::deleteFood/$1');
    });
    
    // ===== CRUD DRINKS =====
    $routes->group('drinks', function($routes) {
        $routes->get('', 'AdminController::drinks');
        $routes->post('create', 'AdminController::createDrink');
        $routes->post('edit/(:any)', 'AdminController::editDrink/$1');
        $routes->get('delete/(:any)', 'AdminController::deleteDrink/$1');
    });
    
    // ===== TAMBAHKAN ROUTE UNTUK STORE MENU (SATU MODAL) =====
    $routes->post('menu/store', 'AdminController::storeMenu');
});
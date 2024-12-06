<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('scan', 'Home::scan');
$routes->get('/register', 'UserController::register');
// $routes->get('/login', 'UserController::login');

$routes->get('/login', 'AuthController::google_login');  // Route to initiate Google login
$routes->get('/login/callback', 'AuthController::google_callback');  // Callback route after Google auth
$routes->get('/logout', 'AuthController::logout');

$routes->get('menu/', 'Home::index');
$routes->get('menu/(:segment)', 'Home::index/$1');

$routes->post('cart/add/(:num)', 'OrderController::addToCart/$1');
$routes->get('cart', 'OrderController::viewcart');

// Routes for admin
$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::admin');
    $routes->match(['get', 'post'], 'edititem', 'AdminController::addedit');
    $routes->match(['get', 'post'], 'edititem/(:num)', 'AdminController::addedit/$1');
    $routes->get('delete/(:num)', 'AdminController::delete/$1');
    $routes->group('user', function($routes) {
        $routes->get('/', 'UserController::admin');
        $routes->get('showuser/(:num)', 'UserController::showuser/$1');
        $routes->match(['get', 'post'], 'edituser', 'UserController::addedit');
        $routes->match(['get', 'post'], 'edituser/(:num)', 'UserController::addedit/$1');
        $routes->get('delete/(:num)', 'UserController::delete/$1');
    });
    $routes->group('category', function($routes) {
        $routes->get('/', 'CategoryController::admin');
        $routes->get('showcategory/(:num)', 'CategoryController::showcategory/$1');
        $routes->match(['get', 'post'], 'editcategory', 'CategoryController::addedit');
        $routes->match(['get', 'post'], 'editcategory/(:num)', 'CategoryController::addedit/$1');
        $routes->get('delete/(:num)', 'CategoryController::delete/$1');
    });
    $routes->group('table', function($routes) {
        $routes->get('/', 'TableController::admin');
        $routes->get('showtable/(:num)', 'TableController::showtable/$1');
        $routes->match(['get', 'post'], 'edittable', 'TableController::addedit');
        $routes->match(['get', 'post'], 'edittable/(:num)', 'TableController::addedit/$1');
        $routes->get('delete/(:num)', 'TableController::delete/$1');
        $routes->get('qrgenerator/', 'TableController::qrgenerator');
        $routes->get('qrgenerator/showqrcode/(:num)', 'TableController::generateQRCode/$1');
        $routes->get('showtable/(:num)', 'TableController::showtable/$1');
    });
    $routes->get('user', 'UserController::admin');
    $routes->get('category', 'CategoryController::admin');
    $routes->get('table', 'TableController::admin');
});


// $routes->get('/showuser/(:num)', 'UserController::showuser/$1');

$routes->get('/showitem/(:num)', 'AdminController::showitem/$1');

$routes->get('/showqrcode', 'TableController::generateQRCode');


$routes->get('/chatui/(:num)', 'AdminController::chatui/$1');  
$routes->get('/chatui', 'AdminController::chatui'); 
$routes->post('/chatbot', 'AdminController::chatbot');  

$routes->get('test_database', 'TestController::testDatabaseConnection');




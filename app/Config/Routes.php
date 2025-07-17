<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// Rute untuk Produk
$routes->get('/product', 'ProductController::index'); // Daftar produk
$routes->get('/product/(:num)', 'ProductController::detail/$1'); // Detail produk
$routes->get('/product/create', 'ProductController::create'); // Form tambah produk
$routes->post('/product/store', 'ProductController::store'); // Simpan produk baru
$routes->get('/product/edit/(:num)', 'ProductController::edit/$1'); // Form edit produk
$routes->post('/product/update/(:num)', 'ProductController::update/$1'); // Update produk
$routes->get('/product/delete/(:num)', 'ProductController::delete/$1'); // Hapus produk

    // Orders
$routes->get('orders', 'OrderAdminController::index');
$routes->get('orders/(:num)', 'OrderAdminController::show/$1');
$routes->post('orders/update-status/(:num)', 'OrderAdminController::updateStatus/$1');

$routes->get('users', 'UserController::index');
$routes->get('users/create', 'UserController::create');
$routes->post('users/store', 'UserController::store');
$routes->get('users/edit/(:num)', 'UserController::edit/$1');
$routes->post('users/update/(:num)', 'UserController::update/$1');
$routes->get('users/delete/(:num)', 'UserController::delete/$1');


// Rute untuk Autentikasi (Login)
$routes->get('/login', 'AuthController::login'); // Halaman login
$routes->post('/login', 'AuthController::loginProcess'); // Proses login
$routes->get('/logout', 'AuthController::logout'); // Logout

// Rute untuk Keranjang Belanja
$routes->get('/cart', 'CartController::index'); // Lihat keranjang belanja
$routes->post('/cart/add', 'CartController::add'); // Menambah produk ke keranjang
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1'); // Menghapus produk dari keranjang
$routes->post('/cart/update/(:num)', 'CartController::update/$1'); // Update jumlah produk di keranjang

// Rute untuk Checkout
$routes->get('/order/(:num)', 'OrderController::detail/$1'); // Lihat detail pesanan

$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/orders/(:num)', 'OrderController::show/$1');

$routes->get('/order', 'OrderController::index');
$routes->get('/order/create', 'OrderController::create');
$routes->post('/order/store', 'OrderController::store');
$routes->get('/order/show/(:num)', 'OrderController::show/$1');
$routes->get('/order/edit/(:num)', 'OrderController::edit/$1');
$routes->post('/order/update/(:num)', 'OrderController::update/$1');
$routes->get('/order/delete/(:num)', 'OrderController::delete/$1');

$routes->get('/product/show/(:num)', 'DetailProductController::show/$1');


$routes->post('/cart/add', 'CartController::add');

$routes->get('/register', 'AuthController::register');
$routes->post('/registerProcess', 'AuthController::registerProcess');
$routes->post('/loginProcess', 'AuthController::loginProcess');

$routes->post('/detailProduct/addToCart/(:segment)', 'DetailProductController::addToCart/$1');
$routes->get ('/order/(:num)'      , 'OrderController::detail/$1');

// Checkout
$routes->get('/checkout',             'CheckoutController::index');
$routes->post('/checkout/process',    'CheckoutController::process');
$routes->get('/checkout/reset',       'CheckoutController::reset');

// Setelah checkout submit, diarahkan ke OrderController::complete
$routes->post('/checkout/complete',   'OrderController::complete');

// Detail pesanan
$routes->get('/order/(:num)',         'OrderController::detail/$1');
$routes->post('/checkout/process', 'CheckoutController::process');

$routes->get('checkout', 'OrderController::checkout');
$routes->post('order/placeOrder', 'OrderController::placeOrder');
$routes->get('order/success/(:num)', 'OrderController::orderSuccess/$1');

$routes->group('my-orders', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'OrderController::myOrders');
    $routes->get('(:num)', 'OrderController::orderDetail/$1');
});

$routes->group('account', ['filter' => 'auth'], function($routes) {
    $routes->get('orders', 'OrderController::myOrders');
    $routes->get('orders/(:num)', 'OrderController::orderDetail/$1');
});

// Admin Routes

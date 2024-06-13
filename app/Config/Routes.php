
<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Home::login');

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PengecekanController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->setAutoRoute(true);

$routes->get('/login', 'Home::login');

$routes->get('/barang', 'BarangController::index');
$routes->post('/tambah-barang', 'BarangController::store');

$routes->get('/customer', 'CustomerController::index');
$routes->post('/tambah-customer', 'CustomerController::store');
$routes->delete('/hapus-customer/(:num)', 'CustomerController::delete/$1');
$routes->post('/edit-customer/(:num)', 'CustomerController::update/$1');

$routes->get('/teknisi', 'TeknisiController::index');
$routes->post('/tambah-teknisi', 'TeknisiController::store');
$routes->delete('/hapus-teknisi/(:num)', 'TeknisiController::delete/$1');
$routes->post('/edit-teknisi/(:num)', 'TeknisiController::update/$1');

$routes->get('/pengecekan', 'PengecekanController::index');
$routes->get('/tambah-pengecekan', 'PengecekanController::create');
$routes->post('/tambah-pengecekan', 'PengecekanController::store');
$routes->get('/tambah-barang-pengecekan/(:num)', 'PengecekanController::tambahbarang/$1');
$routes->post('/tambah-barang-pengecekan', 'PengecekanController::store_tambah_barang');
$routes->get('/edit-pengecekan', 'PengecekanController::edit');
$routes->delete('/hapus-barang-pengecekan/(:num)', 'PengecekanController::delete_barang_cek/$1');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

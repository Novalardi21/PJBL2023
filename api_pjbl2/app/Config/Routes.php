<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->resource("data_guru2");
$routes->put('Edit/(:segment)', 'Edit::index/$1');
$routes->delete('Hapus/(:segment)', 'Hapus::delete/$1');
// $routes->get('kelas_x', 'Kelas_x::index');
$routes->resource("kelas_x");
$routes->put('Edit_kelas_x/(:segment)', 'Edit_kelasX::index/$1');
$routes->delete('Hapus_kelas_x/(:segment)', 'Hapus_kelasX::delete/$1');

$routes->resource("kelas_xi");
$routes->put('Edit_kelas_xi/(:segment)', 'Edit_kelasXI::index/$1');
$routes->delete('Hapus_kelas_xi/(:segment)', 'Hapus_kelasXI::delete/$1');

$routes->resource("kelas_xii");
$routes->put('Edit_kelas_xii/(:segment)', 'Edit_kelasXII::index/$1');
$routes->delete('Hapus_kelas_xii/(:segment)', 'Hapus_kelasXII::delete/$1');

$routes->post('cari', 'Cari_data::index');

// $routes->group('api', ['namespace' => 'App\Controllers\API', 'filter' => 'cors'], function ($routes) {
//     // Definisikan rute-rute API Anda di sini
//     // $routes->resource('data_guru2');
    
// });


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

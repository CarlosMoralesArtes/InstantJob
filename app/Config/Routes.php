<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We add a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::index');
$routes->add('/missatges', 'Home::missatges');
$routes->add('/pujaProductes', 'Home::pujaProductes');
$routes->add('/index', 'Home::home');
$routes->add('/serveis', 'Home::serveis');
$routes->add('/tarifes', 'Home::tarifes');
$routes->add('/compra', 'Home::compra');
$routes->add('/modificarProductes', 'Home::modificarProductes');
$routes->add('/instantadmin', 'Home::admin');
$routes->add('/instantrrhh', 'Home::rrhh');
$routes->add('/form', 'Home::form');
$routes->add('/iniciar', 'Home::formulariIniciSessio');
$routes->add('/registrar', 'Home::formulari');
$routes->add('/configuracio', 'Home::configuracioFormulari');
$routes->add('/tarifaNormal', 'Home::tarifaNormal');
$routes->add('/tarifaAdvanced', 'Home::tarifaAdvanced');
$routes->add('/tarifaEnterprise', 'Home::tarifaEnterprise');
$routes->add('/compraProductes', 'Home::compraProductes');
$routes->add('/avislegal', 'Home::avislegal');
$routes->add('/politicaprivacitat', 'Home::politicaprivacitat');
$routes->add('/politicacookies', 'Home::politicacookies');
$routes->add('/configuracioAdmin', 'Home::configuracioFormulariAdministrador');
$routes->add('/eliminarAdmin', 'Home::eliminarAdmin');
$routes->add('/eliminarAdminPro', 'Home::eliminarAdminPro');
$routes->add('/instantadminpro', 'Home::instantadminpro');
$routes->add('/configuracio', 'Home::configuracio');
$routes->add('/estadistiques', 'Home::estadistiques');
$routes->add('/guardats', 'Home::guardats');
$routes->add('/clear', 'Home::clear');
$routes->add('/mostrar', 'Home::mostrarArxius');
$routes->add('/categoria', 'Home::categoriasel');
// $routes->add('/categoria', 'Home::categoriasel');
$routes->add('/marcar', 'Home::marcar');
// $routes->add('/marcar', 'Home::marcar');
$routes->add('/pujar', 'Home::sqlpujar');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

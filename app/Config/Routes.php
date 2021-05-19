<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cadastrar', 'UserController::registrar');
$routes->get('/login', 'UserController::login');
$routes->post('/login_action', 'UserController::login_action');
$routes->get('/sair', 'UserController::logout');
$routes->post('/novoestagiario', 'UserController::novoEstagiario');
$routes->post('/novoempregador', 'UserController::novoEmpregador');
$routes->get('/estagiario', 'UserController::ambienteEstagiario', ['filter' => 'authestag']);
$routes->get('/estagiario/editar/(:num)', 'UserController::editEstagiario/$1', ['filter' => 'authestag']);
$routes->post('/estagio/edit/(:num)', 'UserController::estagStore/$1', ['filter' => 'authestag']);
$routes->get('/empregador', 'UserController::ambienteEmpregador', ['filter' => 'authemp']);

$routes->get('/empregador/editar/(:num)', 'UserController::editEmpregador/$1', ['filter' => 'authemp']);
$routes->post('/empregador/edit/(:num)', 'UserController::EmpStore/$1', ['filter' => 'authemp']);

$routes->get('/vagas', 'VagaController::index', ['filter' => 'authestag']);
$routes->get('/empresas', 'VagaController::consultaEmpresas', ['filter' => 'authestag']);
$routes->add('/vaga/(:num)', 'VagaController::vaga/$1', ['filter' => 'authestag']);
$routes->get('/cadastro-vaga', 'VagaController::cadastrarVaga', ['filter' => 'authemp']);

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

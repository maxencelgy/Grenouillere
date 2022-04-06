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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Grenouillere::index');

// CHILDREN //////////////////////////////////
$routes->get('/create-children', 'Children::create');
$routes->post('/children/add', 'Children::handlePost');
$routes->get('/children/modify/(:num)', 'Children::handleModify/$1');
$routes->post('/children/modify/modified', 'Children::handleModified');
$routes->get('/children/delete/(:num)', 'Children::handleDelete/$1');
$routes->post('/children/allergyChild', 'Children::handlePostAllergyChild');
$routes->post('/children/diseaseChild', 'Children::handlePostDiseaseChild');


$routes->get('profil/editCompany/(:num)', 'ProfilController::editCompany/$1');
$routes->post('profil/modify/(:num)', 'ProfilController::companyModify/$1');
$routes->post('/calendar/add', 'ProfilController::handlePostCalandar');


//ALLERGY
$routes->post('/allergie/Ajouter', 'allergyController::addAllergy');
$routes->post('/maladie/Ajouter', 'DiseaseController::addDisease');

$routes->get('authentification', 'AuthenticationController::viewAuth');
$routes->match(['get', 'post'], 'particulier/inscription', 'AuthenticationController::registerUser');
$routes->match(['get', 'post'], 'particulier/connexion', 'AuthenticationController::loginUser');
$routes->get('deconnexion', 'AuthenticationController::logoutUser');
// Company / Incription connection
$routes->match(['get', 'post'], 'entreprise/inscription', 'AuthenticationController::registerCompany');
$routes->match(['get', 'post'], 'entreprise/connexion', 'AuthenticationController::loginCompany');

////Search result
$routes->match(['get', 'post'], 'resultats', 'ResultsController::index');
$routes->get('profil/creche/(:num)', 'ResultsController::singlePage/$1');
// $routes->post('profil/creche/(:num)', 'ResultsController::singlePage/$1');

// Facture
$routes->get('profil/facture/(:num)', 'FactureController::factureUser/$1');
$routes->get('profil/facture', 'FactureController::factureUser');

// Adding resvation
$routes->post('/reservation/ajouter/enfant/(:num)', 'ResultsController::addReservation/$1');



//////////////////////PROFIL  //////////////////////////////////
$routes->get('profil', 'ProfilController::index');
$routes->get('profil/compagny/(:num)', 'ProfilController::ProfilCompany/$1');
$routes->post('add/addFiles/(:num)', 'ProfilController::updateFile/$1');


// RESERVATION CSV/////////////////
$routes->get('export/(:num)', 'CsvController::export/$1');
$routes->get('/export/all/(:num)', 'CsvController::exportAll/$1');

// ///ADMIN /////////////////
$routes->get('/admin', 'AdminController::index');
$routes->post('/admin/modified', 'AdminController::handleModified');
$routes->get('/admin/allergie', 'AdminController::viewAllergie');
$routes->get('/admin/allergie/delete/(:num)', 'AdminController::handleDelete/$1');
$routes->get('/admin/maladie/delete/(:num)', 'AdminController::handleDeleteMaladie/$1');


// STRIPE

$routes->get("stripe/(:num)", "StripeController::stripe/$1");
$routes->post("payment/(:num)", "ResultsController::payment/$1");



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
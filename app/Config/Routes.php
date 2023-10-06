<?php

// use CodeIgniter\Router\RouteCollection;

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

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('login', 'Login::login');
$routes->get('srt(:segment)', 'Letter::surat/$1', ['segment' => '(masuk|keluar)']);
$routes->post('srt(:segment)', 'Letter::newSurat/$1', ['segment' => '(masuk|keluar)']);
$routes->get('surat', 'Letter::surat');
$routes->get('viewSurat/(:num)', 'Letter::viewpdf/$1');
$routes->post('approveLetter', 'Letter::approveLetter');
$routes->get('logout', 'Login::logout');
$routes->get('users', 'User::index');
$routes->get('home', 'Login::home');
$routes->post('deleteUser/(:num)', 'User::deleteUser/$1');
$routes->post('user','User::createUser');
$routes->post('changeRole/(:num)', 'User::changeRole/$1');
$routes->post('disposeLetter', 'Letter::disposeLetter');

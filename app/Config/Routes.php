<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'c_Home::index');
$routes->get('/about', 'c_Home::about');
$routes->get('/expositions', 'c_expositions::index');
$routes->get('/espace_ludique', 'c_ludique::index');
$routes->get('/auteurs', 'c_auteurs::index');
$routes->get('/pratique', 'c_pratique::index');
$routes->get('/contact', 'c_contact::index');
$routes->match(['get', 'post'], '/validerRep', 'c_ludique::valider');



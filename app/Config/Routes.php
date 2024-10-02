<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//login
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');

//register
$routes->get('/register', 'Login::register');
$routes->post('/register', 'Login::register');


//home
$routes->get('/home', 'Home::index');

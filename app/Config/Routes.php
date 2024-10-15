<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//login
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/auth', 'Login::auth');
$routes->post('/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->post('/simpanData', 'Login::simpanData');


//register
$routes->get('/register', 'Login::register');
$routes->post('/register', 'Login::register');


//home
$routes->get('/beranda', 'Beranda::index');


//pengguna / User
$routes->get('/user', 'User::index');

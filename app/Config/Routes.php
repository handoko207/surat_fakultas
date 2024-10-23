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

$routes->get('/error403', 'Login::error403');

//register
$routes->get('/register', 'Login::register');
$routes->post('/register', 'Login::register');


//home
$routes->get('/beranda', 'Beranda::index');


//pengguna / User
$routes->get('/user', 'User::index');
$routes->get('/user/ajaxDatatable', 'User::ajaxDatatable');
$routes->post('/user/simpanTambah', 'User::simpanTambah');
$routes->get('/user/getEdit/(:any)', 'User::getEdit/$1');
$routes->post('/user/updateData/(:any)', 'User::updateData/$1');
$routes->get('/user/hapusData/(:any)', 'User::hapusData/$1');
$routes->get('/user/resetPassword/(:any)', 'User::resetPassword/$1');


//program studi
$routes->get('/program-studi', 'ProgramStudi::index');
$routes->get('/program-studi/ajaxDatatable', 'ProgramStudi::ajaxDatatable');
$routes->post('/program-studi/simpanTambah', 'ProgramStudi::simpanTambah');
$routes->get('/program-studi/getEdit/(:any)', 'ProgramStudi::getEdit/$1');
$routes->post('/program-studi/updateData/(:any)', 'ProgramStudi::updateData/$1');
$routes->get('/program-studi/hapusData/(:any)', 'ProgramStudi::hapusData/$1');
$routes->get('/program-studi/resetPassword/(:any)', 'ProgramStudi::resetPassword/$1');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/dashboard', 'Home::dashboard');
$routes->get('program-layanan', 'ProgramLayanan::index');




/** Master Data **/
/** Jenis sampel **/
$routes->group('master-data/jenis-sampel', function ($routes) {
    $routes->get('', 'JenisSampelMaster::index');
    $routes->get('list-data', 'JenisSampelMaster::list');
    $routes->get('add-data', 'JenisSampelMaster::new');
    $routes->post('create-data', 'JenisSampelMaster::create');
    $routes->get('edit-data/(:num)', 'JenisSampelMaster::edit/$1');
    $routes->post('update-data', 'JenisSampelMaster::update');
    $routes->delete('delete-data/(:num)', 'JenisSampelMaster::delete/$1');
});


/** Data laboratorim **/
$routes->group('master-data/laboratorium', function ($routes) {
    $routes->get('', 'LaboratoriumMaster::index');
    $routes->get('list-data', 'LaboratoriumMaster::list');
    $routes->get('add-data', 'LaboratoriumMaster::new');
    $routes->post('create-data', 'LaboratoriumMaster::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumMaster::edit/$1');
    $routes->post('update-data', 'LaboratoriumMaster::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumMaster::delete/$1');
});


/** Data biaya akomodasi **/
$routes->group('master-data/biaya-akomodasi', function ($routes) {
    $routes->get('', 'BiayaAkomodasiMaster::index');
    $routes->get('list-data', 'BiayaAkomodasiMaster::list');
    $routes->get('add-data', 'BiayaAkomodasiMaster::new');
    $routes->post('create-data', 'BiayaAkomodasiMaster::create');
    $routes->get('edit-data/(:num)', 'BiayaAkomodasiMaster::edit/$1');
    $routes->post('update-data', 'BiayaAkomodasiMaster::update');
    $routes->delete('delete-data/(:num)', 'BiayaAkomodasiMaster::delete/$1');
});

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('master-data', function ($routes) {
    $routes->get('jenis-sampel', 'JenisSampelMaster::index');
    $routes->get('jenis-sampel/list-data', 'JenisSampelMaster::list');
    $routes->get('jenis-sampel/add-data', 'JenisSampelMaster::new');
    $routes->post('jenis-sampel/create-data', 'JenisSampelMaster::create');
});

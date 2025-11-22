<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('program-layanan', function ($routes) {
    $routes->get('', 'ProgramLayanan::index');
});

$routes->group('program-layanan/buku-tamu', function ($routes) {
    $routes->get('', 'BukuTamu::index');
    $routes->get('add-data', 'BukuTamu::new');
    $routes->post('create-data', 'BukuTamu::create');
    $routes->get('list-data', 'BukuTamu::list');
    $routes->get('detail-data/(:num)', 'BukuTamu::show/$1');
    $routes->get('jam-keluar/(:num)', 'BukuTamu::set_jam_keluar/$1');
    $routes->post('update-jam-keluar', 'BukuTamu::update_jam_keluar');
    $routes->get('cari-sampel', 'BukuTamu::cari_sampel');
    $routes->get('catatan', 'BukuTamu::cari_catatan');
    $routes->get('list-all', 'BukuTamu::list_all');
    $routes->post('cari-data-tamu', 'BukuTamu::cari_data_tamu');
});

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

/** Data instansi **/
$routes->group('master-data/instansi', function ($routes) {
    $routes->get('', 'InstansiMaster::index');
    $routes->get('list-data', 'InstansiMaster::list');
    $routes->get('add-data', 'InstansiMaster::new');
    $routes->post('create-data', 'InstansiMaster::create');
    $routes->get('edit-data/(:num)', 'InstansiMaster::edit/$1');
    $routes->post('update-data', 'InstansiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstansiMaster::delete/$1');
});

/** Penyakit **/
$routes->group('master-data/penyakit', function ($routes) {
    $routes->get('', 'PenyakitMaster::index');
    $routes->get('list-data', 'PenyakitMaster::list');
    $routes->get('add-data', 'PenyakitMaster::new');
    $routes->post('create-data', 'PenyakitMaster::create');
    $routes->get('edit-data/(:num)', 'PenyakitMaster::edit/$1');
    $routes->post('update-data', 'PenyakitMaster::update');
    $routes->delete('delete-data/(:num)', 'PenyakitMaster::delete/$1');
});


/** Coolbox **/
$routes->group('master-data/coolbox', function ($routes) {
    $routes->get('', 'CoolboxMaster::index');
    $routes->get('list-data', 'CoolboxMaster::list');
    $routes->get('add-data', 'CoolboxMaster::new');
    $routes->post('create-data', 'CoolboxMaster::create');
    $routes->get('edit-data/(:num)', 'CoolboxMaster::edit/$1');
    $routes->post('update-data', 'CoolboxMaster::update');
    $routes->delete('delete-data/(:num)', 'CoolboxMaster::delete/$1');
});

/** Pelanggan **/
$routes->group('master-data/pelanggan', function ($routes) {
    $routes->get('', 'PelangganMaster::index');
    $routes->get('list-data', 'PelangganMaster::list');
    $routes->get('add-data', 'PelangganMaster::new');
    $routes->post('create-data', 'PelangganMaster::create');
    $routes->get('edit-data/(:num)', 'PelangganMaster::edit/$1');
    $routes->post('update-data', 'PelangganMaster::update');
    $routes->delete('delete-data/(:num)', 'PelangganMaster::delete/$1');
});

/** Modul Pelayanan Pemeriksaan **/
/** Pengantar LHU **/
$routes->group('pelayanan-pemeriksaan/pengantar-lhu', function ($routes) {
    $routes->get('', 'PengantarLhu::index');
    $routes->get('list-data', 'PengantarLhu::list');
    $routes->get('add-data', 'PengantarLhu::new');
    $routes->post('create-data', 'PengantarLhu::create');
    $routes->get('edit-data/(:num)', 'PengantarLhu::edit/$1');
    $routes->post('update-data', 'PengantarLhu::update');
    $routes->delete('delete-data/(:num)', 'PengantarLhu::delete/$1');
    $routes->get('setting-lab/(:num)', 'PengantarLhu::setting_lab/$1');
    $routes->post('create-setting-lab', 'PengantarLhu::create_setting_lab');
});

/** Setting LHU **/
$routes->group('pelayanan-pemeriksaan/proses-lhu', function ($routes) {
    $routes->get('index/(:any)', 'ProsesLhu::index/$1');
    $routes->get('list-menu/(:any)', 'ProsesLhu::list_menu/$1');
    $routes->get('keterangan/(:any)', 'KeteranganPemeriksaan::index/$1');
});

$routes->group('pelayanan-pemeriksaan/lhu/fisika-kimia-air', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'FisikaKimiaAir::index/$1/$1');
    $routes->get('list-data', 'FisikaKimiaAir::list');
    $routes->get('add-data', 'FisikaKimiaAir::new');
    $routes->post('create-data', 'FisikaKimiaAir::create');
});




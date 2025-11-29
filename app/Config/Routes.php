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

/** Data instalasi **/
$routes->group('master-data/instalasi', function ($routes) {
    $routes->get('', 'InstalasiMaster::index');
    $routes->get('list-data', 'InstalasiMaster::list');
    $routes->get('add-data', 'InstalasiMaster::new');
    $routes->post('create-data', 'InstalasiMaster::create');
    $routes->get('edit-data/(:num)', 'InstalasiMaster::edit/$1');
    $routes->post('update-data', 'InstalasiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstalasiMaster::delete/$1');
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

$routes->group('pelayanan-pemeriksaan/lhu/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
});

/** Laboratorium tujuan **/
$routes->group('laboratorium-tujuan', function ($routes) {
    $routes->get('index/(:any)', 'LaboratoriumTujuan::index/$1');
    $routes->get('list-data', 'LaboratoriumTujuan::list');
    $routes->get('add-data/(:any)', 'LaboratoriumTujuan::new/$1');
    $routes->post('create-data', 'LaboratoriumTujuan::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumTujuan::edit/$1');
    $routes->post('update-data', 'LaboratoriumTujuan::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumTujuan::delete/$1');
});

$routes->group('pelayanan-pemeriksaan/keterangan-lhu', function ($routes) {
    $routes->get('', 'KeteranganLhu::index');
    $routes->get('list-data', 'KeteranganLhu::list');
    $routes->get('add-data', 'KeteranganLhu::new');
    $routes->post('create-data', 'KeteranganLhu::create');
    $routes->get('edit-data/(:num)', 'KeteranganLhu::edit/$1');
    $routes->post('update-data', 'KeteranganLhu::update');
    $routes->delete('delete-data/(:num)', 'KeteranganLhu::delete/$1');
});

$routes->group('pelayanan-pemeriksaan/kondisi-lingkungan-sekitar-sampel', function ($routes) {
    $routes->get('', 'KondisiLingkunganSekitarSampel::index');
    $routes->get('list-data', 'KondisiLingkunganSekitarSampel::list');
    $routes->get('add-data', 'KondisiLingkunganSekitarSampel::new');
    $routes->post('create-data', 'KondisiLingkunganSekitarSampel::create');
    $routes->get('edit-data/(:num)', 'KondisiLingkunganSekitarSampel::edit/$1');
    $routes->post('update-data', 'KondisiLingkunganSekitarSampel::update');
    $routes->delete('delete-data/(:num)', 'KondisiLingkunganSekitarSampel::delete/$1');
});

$routes->group('pelayanan-pemeriksaan/kaji-ulang-permintaan-kontrak', function ($routes) {
    $routes->get('', 'KajiUlangPermintaanKontrak::index');
    $routes->get('list-data', 'KajiUlangPermintaanKontrak::list');
    $routes->get('add-data', 'KajiUlangPermintaanKontrak::new');
    $routes->post('create-data', 'KajiUlangPermintaanKontrak::create');
    $routes->get('edit-data/(:num)', 'KajiUlangPermintaanKontrak::edit/$1');
    $routes->post('update-data', 'KajiUlangPermintaanKontrak::update');
    $routes->delete('delete-data/(:num)', 'KajiUlangPermintaanKontrak::delete/$1');
});

$routes->group('pelayanan-pemeriksaan/penanggung-jawab-lhu', function ($routes) {
    $routes->get('', 'PenanggungJawabLhu::index');
    $routes->get('list-data', 'PenanggungJawabLhu::list');
    $routes->get('add-data', 'PenanggungJawabLhu::new');
    $routes->post('create-data', 'PenanggungJawabLhu::create');
    $routes->get('edit-data/(:num)', 'PenanggungJawabLhu::edit/$1');
    $routes->post('update-data', 'PenanggungJawabLhu::update');
    $routes->delete('delete-data/(:num)', 'PenanggungJawabLhu::delete/$1');
});


$routes->group('pelayanan-pemeriksaan/resume', function ($routes) {
    $routes->get('', 'ResumeLayananPemeriksaan::index');
    $routes->get('cetak-resume/(:any)', 'ResumeLayananPemeriksaan::cetak/$1');
});


$routes->group('file/reader', function ($routes) {
    $routes->get('standar-pelayanan', 'FileReader::standar_pelayanan');
    $routes->get('tarif-pelayanan', 'FileReader::tarif_pelayanan');
    $routes->get('permenkes-no2-2023', 'FileReader::permenkes_no2_2023');
    $routes->get('menlhk-no68-2016', 'FileReader::menlhk_no68_2016');
    $routes->get('permenlh-no11-2025', 'FileReader::permenlh_no11_2025');
    $routes->get('permenlh-no12-2025', 'FileReader::permenlh_no12_2025');
    $routes->get('pertek-baku-mutu-limbah-domestik', 'FileReader::pertek_bml_domestik');
    $routes->get('permenkes-no1096-2011', 'FileReader::permenkes_no1096_2011');
    $routes->get('permenkes-no7-aami-2019', 'FileReader::permenkes_no7_aami_2019');
});


/** Data peraturan / baku mutu **/
$routes->group('master-data/peraturan-baku-mutu', function ($routes) {
    $routes->get('', 'PeraturanMaster::index');
    $routes->get('list-data', 'PeraturanMaster::list');
    $routes->get('add-data', 'PeraturanMaster::new');
    $routes->post('create-data', 'PeraturanMaster::create');
    $routes->get('edit-data/(:num)', 'PeraturanMaster::edit/$1');
    $routes->post('update-data', 'PeraturanMaster::update');
    $routes->delete('delete-data/(:num)', 'PeraturanMaster::delete/$1');
});

/** Pengaturan Coolbox masuk **/

$routes->group('Pengaturan-coolbox/coolbox', function ($routes) {
    $routes->get('', 'CoolboxMasuk::index');
    $routes->get('list-data', 'CoolboxMasuk::list');
    $routes->get('add-data', 'CoolboxMasuk::new');
    $routes->post('create-data', 'CoolboxMasuk::create');
    $routes->get('edit-data/(:num)', 'CoolboxMasuk::edit/$1');
    $routes->post('update-data', 'CoolboxMasuk::update');
    $routes->delete('delete-data/(:num)', 'CoolboxMasuk::delete/$1');
});

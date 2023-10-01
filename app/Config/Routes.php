<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Dashboard
$routes->get('/', 'Dashboard::index');

// Penyakit
$routes->get('/penyakit', 'Penyakit::index');
$routes->get('/penyakit/tambah', 'Penyakit::tambahPenyakit');
$routes->post('/penyakit/simpan', 'Penyakit::simpan');
$routes->delete('/penyakit/hapus/(:num)', 'penyakit::hapus/$1');
$routes->get('/penyakit/ubah/(:num)', 'Penyakit::ubah/$1');
$routes->post('/penyakit/edit/(:num)', 'Penyakit::edit/$1');
$routes->get('/penyakit/export-pdf', 'Penyakit::exportPDF');

// Rules
$routes->get('/rules', 'Rules::index');
$routes->post('/rules/rules-baru', 'Rules::tambahRulesGejala');
$routes->get('/rules/export-pdf', 'Rules::exportPDF');

// Gejala
$routes->get('/gejala', 'Gejala::index');
$routes->get('/gejala/tambah', 'Gejala::tambahGejala');
$routes->post('/gejala/simpan', 'Gejala::simpan');
$routes->delete('/gejala/hapus/(:num)', 'Gejala::hapus/$1');
$routes->get('/gejala/ubah/(:num)', 'Gejala::ubah/$1');
$routes->post('/gejala/edit/(:num)', 'Gejala::edit/$1');
$routes->get('/gejala/export-pdf', 'Gejala::exportPDF');

// Diagnosis
$routes->get('/diagnosis', 'Diagnosis::index');
$routes->post('/diagnosis/penyakit', 'Diagnosis::diagnosis');
$routes->get('/diagnosis/export-pdf', 'Diagnosis::exportPDF');

// Pengguna
$routes->get('/identifikasi', 'Diagnosis::index2');
$routes->post('/identifikasi/penyakit', 'Diagnosis::diagnosis2');

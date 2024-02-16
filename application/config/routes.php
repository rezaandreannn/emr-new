<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'Login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth Routes
$route['logout'] = 'Login_controller/Logout';
$route['login'] = 'Login_controller/Login_proses';

// -- POLIKLINIK -- //
// Nurse Rajal Routes
$route['prwt/rajal'] = 'Nurse/Rajal_controller';
$route['prwt/rajal/add'] = 'Nurse/Rajal_controller/add';
$route['prwt/rajal/cetak-profil'] = 'Nurse/Rajal_controller/resume';
$route['prwt/rajal/create/(:any)/(:any)'] = 'Nurse/Rajal_controller/create/$1/$2';
$route['prwt/rajal/store'] = 'Nurse/Rajal_controller/store';
$route['prwt/rajal/update'] = 'Nurse/Rajal_controller/update';
$route['prwt/rajal/edit/(:any)/(:any)'] = 'Nurse/Rajal_controller/edit/$1/$2';


// Nurse Bidan Routes
$route['prwt/bidan'] = 'Nurse/Bidan_controller';
$route['prwt/bidan/create/(:any)/(:any)'] = 'Nurse/Bidan_controller/create/$1/$2';

// dokter routes
// -- Dokter -- //
$route['igd/medis'] = 'Poliklinik/Dokter/Medis_controller';
$route['igd/cppt-igd'] = 'Poliklinik/Dokter/Cppt_controller';
$route['igd/skrining-tb'] = 'Poliklinik/Dokter/Skrining_controller';

$route['poliklinik/daftar-pasien'] = 'Poliklinik/Dokter/Assesmen_controller/index';
$route['poliklinik/periksa/(:any)/(:any)'] = 'Poliklinik/Dokter/Assesmen_controller/create/$1/$2';
$route['poliklinik/periksa/edit/(:any)/(:any)'] = 'Poliklinik/Dokter/Assesmen_controller/edit/$1/$2';
$route['poliklinik/store'] = 'Poliklinik/Dokter/Assesmen_controller/store';
$route['poliklinik/update'] = 'Poliklinik/Dokter/Assesmen_controller/update';
// -- POLIKLINIK -- //

// Nurse Rencana OP Routes
$route['prwt/rencana_op'] = 'Nurse/RencanaController';


// RM Berkas Harian Routes
$route['rm/berkas_harian'] = 'Rm/Harian_controller';

// RM Berkas Rekam Medis
$route['rm/berkas'] = 'Rm/Berkas_controller';

$route['dashboard'] = 'Dashboard_controller';


// -- SATU SEHAT -- //
$route['satu-sehat/encounter'] = 'SatuSehat/Kunjungan_controller';

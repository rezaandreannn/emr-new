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
// Nurse Rajal Routes //
$route['prwt/rajal'] = 'Nurse/Rajal_controller';
$route['prwt/rajal/add'] = 'Nurse/Rajal_controller/add';
$route['prwt/rajal/cetak-profil/(:any)'] = 'Nurse/Rajal_controller/resume/$1';
$route['prwt/rajal/create/(:any)/(:any)'] = 'Nurse/Rajal_controller/create/$1/$2';
$route['prwt/rajal/store'] = 'Nurse/Rajal_controller/store';
$route['prwt/rajal/update'] = 'Nurse/Rajal_controller/update';
$route['prwt/rajal/edit/(:any)/(:any)'] = 'Nurse/Rajal_controller/edit/$1/$2';
$route['prwt/rajal/edit_skdp/(:any)'] = 'Nurse/Rajal_controller/edit_skdp/$1';


// Nurse Bidan Routes //
$route['prwt/bidan'] = 'Nurse/Bidan_controller';
$route['prwt/bidan/create/(:any)/(:any)'] = 'Nurse/Bidan_controller/create/$1/$2';

// dokter routes //
// -- Dokter -- //
$route['igd/medis'] = 'Poliklinik/Dokter/Medis_controller';
$route['igd/cppt-igd'] = 'Poliklinik/Dokter/Cppt_controller';
$route['igd/skrining-tb'] = 'Poliklinik/Dokter/Skrining_controller';

$route['poliklinik/daftar-pasien'] = 'Poliklinik/Dokter/Assesmen_controller/index';
$route['poliklinik/periksa/(:any)/(:any)'] = 'Poliklinik/Dokter/Assesmen_controller/create/$1/$2';
$route['poliklinik/periksa/edit/(:any)/(:any)'] = 'Poliklinik/Dokter/Assesmen_controller/edit/$1/$2';
$route['poliklinik/store'] = 'Poliklinik/Dokter/Assesmen_controller/store';
$route['poliklinik/update'] = 'Poliklinik/Dokter/Assesmen_controller/update';
$route['poliklinik/copy_pemeriksaan/(:any)/(:any)/(:any)'] = 'Poliklinik/Dokter/Assesmen_controller/copy_pemeriksaan/$1/$2/$3';
// -- POLIKLINIK -- //

// Nurse Rencana OP Routes //
$route['prwt/rencana_op'] = 'Nurse/RencanaController';


// RM Berkas Harian Routes //
$route['rm/berkas_harian'] = 'Rm/Harian_controller';

// RM Berkas Rekam Medis //
$route['rm/berkas'] = 'Rm/Berkas_controller';
$route['rm/berkas/cetak-profil/(:any)'] = 'Rm/Berkas_controller/resume/$1';

$route['dashboard'] = 'Dashboard_controller';


// -- SATU SEHAT -- //
$route['satu-sehat/encounter'] = 'SatuSehat/Kunjungan_controller';


// Fisioterapi
$route['fisioterapi/list_pasien'] = 'Fisioterapi/Terapis/Terapis_controller';
$route['fisioterapi/informed_concent'] = 'Fisioterapi/Terapis/Terapis_controller/informed_concent';
$route['fisioterapi/cari_pasien'] = 'Fisioterapi/Terapis/Terapis_controller/cari_proses';
$route['fisioterapi/transaksi_fisio/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/create/$1';
$route['fisioterapi/cppt/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/create_cppt/$1/$2';
$route['fisioterapi/store'] = 'Fisioterapi/Terapis/Terapis_controller/store';
$route['fisioterapi/store_cppt'] = 'Fisioterapi/Terapis/Terapis_controller/store_cppt';
$route['fisioterapi/store_informed_concent'] = 'Fisioterapi/Terapis/Terapis_controller/store_informed_concent';
$route['fisioterapi/update_cppt'] = 'Fisioterapi/Terapis/Terapis_controller/update_cppt';
$route['fisioterapi/delete_transaksi/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/delete/$1/$2';
$route['fisioterapi/update_transaksi'] = 'Fisioterapi/Terapis/Terapis_controller/update_transaksi_cppt';
$route['fisioterapi/delete_cppt/(:any)/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/delete_cppt/$1/$2/$3';
$route['fisioterapi/edit_cppt/(:any)/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/edit_cppt/$1/$2/$3';
$route['fisioterapi/cetak_bukti_pelayanan/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/cetak_bukti_pelayanan/$1/$2';
$route['fisioterapi/cetak_cppt/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/cetak_cppt/$1/$2';
$route['fisioterapi/cetak_informed_concent/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/cetak_informed_concent/$1';
$route['fisioterapi/ttd_pasien/(:any)/(:any)'] = 'Fisioterapi/Terapis/Terapis_controller/ttd_pasien/$1/$2';
$route['fisioterapi/store_ttd_pasien'] = 'Fisioterapi/Terapis/Terapis_controller/store_ttd_pasien';

// tanda tangan petugas
$route['ttd/list-ttd'] = 'Tanda_tangan/Tanda_tangan_controller';
$route['ttd/add'] = 'Tanda_tangan/Tanda_tangan_controller/proses_ttd';
$route['ttd/update_ttd'] = 'Tanda_tangan/Tanda_tangan_controller/proses_edit_ttd';
$route['ttd/delete_ttd/(:any)'] = 'Tanda_tangan/Tanda_tangan_controller/delete_ttd/$1';
$route['ttd/edit_ttd/(:any)'] = 'Tanda_tangan/Tanda_tangan_controller/edit_ttd/$1';

// cetak berkas rekam medis //
$route['cetak_rm/rajal/lab/qrcode/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/QRcode/$1';
$route['cetak_rm/rajal/lab/(:any)/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_lab/$1/$2';
$route['cetak_rm/rajal/lab2/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_lab2/$1';
$route['cetak_rm/rajal/rad/(:any)/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_radiologi/$1/$2';
$route['cetak_rm/rajal/verif/(:any)/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_verif/$1/$2';
$route['cetak_rm/rajal/verif2/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_verif2/$1';
$route['cetak_rm/rajal/resep/(:any)/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_pengantar_resep/$1/$2';
$route['cetak_rm/rajal/skdp/(:any)/(:any)'] = 'Report_rm/Rawat_jalan/Berkas_rm_controller/cetak_surat_skdp/$1/$2';

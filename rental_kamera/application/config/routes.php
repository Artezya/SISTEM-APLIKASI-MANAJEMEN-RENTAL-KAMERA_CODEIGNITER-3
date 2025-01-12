<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';  // Halaman utama, bisa ditentukan sesuai keinginan
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routing untuk Kamera
$route['kamera'] = 'kamera/index';  // Daftar kamera
$route['kamera/tambah'] = 'kamera/tambah';  // Form tambah kamera
$route['kamera/edit/(:num)'] = 'kamera/edit/$1';  // Form edit kamera
$route['kamera/hapus/(:num)'] = 'kamera/hapus/$1';  // Hapus kamera

// Routing untuk Pelanggan
$route['pelanggan'] = 'pelanggan/index';  // Daftar pelanggan
$route['pelanggan/tambah'] = 'pelanggan/tambah';  // Form tambah pelanggan
$route['pelanggan/edit/(:num)'] = 'pelanggan/edit/$1';  // Form edit pelanggan
$route['pelanggan/hapus/(:num)'] = 'pelanggan/hapus/$1';  // Hapus pelanggan

// Routing untuk Transaksi
$route['transaksi'] = 'transaksi/index';
$route['transaksi/tambah'] = 'transaksi/tambah';
$route['transaksi/simpan'] = 'transaksi/simpan';
$route['transaksi/edit/(:num)'] = 'transaksi/edit/$1';
$route['transaksi/update/(:num)'] = 'transaksi/update/$1';
$route['transaksi/hapus/(:num)'] = 'transaksi/hapus/$1';

// Routing untuk Laporan
$route['laporan/transaksi'] = 'laporan/transaksi';  // Laporan transaksi
$route['transaksi/cetak_pdf'] = 'transaksi/cetak_pdf';

$route['auth'] = 'auth/index';
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';

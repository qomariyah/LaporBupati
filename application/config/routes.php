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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'lb';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = TRUE;

$route['sysadmin'] = 'sysadmin/dashboard';
$route['sysadmin/opd'] = "sysadmin/opd/data";
$route['sysadmin/administrator'] = "sysadmin/administrator/data";
$route['sysadmin/komentar'] = "sysadmin/komentar/data";
$route['sysadmin/user'] = "sysadmin/user/data";

$route['sysopd'] = 'sysopd/dashboard';

$route['sysbupati'] = 'sysbupati/dashboard';

$route['sysadminlogin'] = 'sysadmin/sysadmin';
$route['sysadminlogin/auth'] = 'sysadmin/sysadmin/auth';
$route['sysadminlogin/oauth'] = 'sysadmin/sysadmin/oauth';
$route['sysadminlogin/logout'] = 'sysadmin/sysadmin/logout';

//aduan
$route['kontak'] 			  = 'front/kontak';
$route['tentang'] 			  = 'front/tentang';
$route['profil'] 			  = 'front/user/profil';
$route['petunjuk-dan-syarat'] = 'lb/petunjuk_syarat';
$route['opd'] 				  = 'front/opd';
$route['opd/detail']		  = 'front/opd/detail';
$route['aduan-saya'] 		  = 'aduan/aduan_saya';
$route['login']				  = 'lb/login';
$route['auth']                = 'front/user/auth';
$route['lupa-sandi'] 		  = 'lb/forget_password';
$route['daftar'] 			  = 'front/user/register';
$route['logout']			  = 'front/user/logout';

/*$route['kontak'] = 'lb/kontak';
$route['tentang'] = 'lb/tentang_lb';
$route['profil'] = 'front/user/profil';
$route['petunjuk-dan-syarat'] = 'lb/petunjuk_syarat';
$route['data-opd'] = 'lb/data_opd';
$route['detail-opd'] = 'lb/detail_opd';
$route['aduan-saya'] = 'aduan/aduan_saya';
$route['login'] = 'lb/login';
$route['auth'] = 'lb/auth';
$route['lupa-sandi'] = 'lb/forget_password';
$route['daftar'] = 'front/user/register';*/
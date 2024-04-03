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
$route['hospital-app-yearly'] = 'Hospital/yearly';
$route['hospital-app-yearly-patient'] = 'Hospital/yearly_patient';
$route['hospital-app-yearly-doctor'] = 'Hospital/yearly_doctor';
$route['hospital-app-yearly-disease'] = 'Hospital/yearly_disease';
$route['hospital-app-yearly-unit'] = 'Hospital/yearly_unit';
$route['hospital-app-yearly-product'] = 'Hospital/yearly_product';
$route['hospital-app-yearly-medicine'] = 'Hospital/yearly_medicine';
$route['hospital-app-get-yearly-patient'] = 'Hospital/get_yearly_patient';
$route['hospital-app-get-yearly-doctor'] = 'Hospital/get_yearly_doctor';
$route['hospital-app-get-yearly-disease'] = 'Hospital/get_yearly_disease';
$route['hospital-app-get-yearly-unit'] = 'Hospital/get_yearly_unit';
$route['hospital-app-get-yearly-product'] = 'Hospital/get_yearly_product';
$route['hospital-app-get-yearly-medicine'] = 'Hospital/get_yearly_medicine';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

$route['hospital-app-date'] = 'Hospital/index';
$route['hospital-app'] = 'Hospital/pasien';
$route['hospital-app-patient'] = 'Hospital/pasien';
$route['inject-daily-report'] = 'SuperAdmin/injectDailyReport';
$route['export-daily-report'] = 'SuperAdmin/exportDailyReport';
$route['export-daily-report'] = 'SuperAdmin/exportDailyReport';
$route['superAdmin/excel-step/(:num)'] = 'SuperAdmin/excelStep/$1';
$route['superAdmin/excel-sub-step/(:num)'] = 'SuperAdmin/excelSubStep/$1';
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

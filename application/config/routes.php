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
$route['default_controller'] = 'main_controller';

$route['register']  = "Login_Controller/register";
$route['login']     = "Login_Controller/login";
$route['logout']    = "Login_Controller/logout";

$route['patient']                   = "Main_Controller/patient";
$route['add_patient']               = "Main_Controller/add_patient";
$route['patient_info/(:any)']       = "Main_Controller/patient_info/$1";
$route['medical_record/(:any)']     = "Main_Controller/medical_record/$1";

$route['nurse']                     = "Main_Controller/nurse";

$route['child_report']              = "Main_Controller/child_report";
$route['add_child']                 = "Main_Controller/add_child";

$route['medicine']                  = "Main_Controller/medicine";
$route['add_product']               = "Main_Controller/add_product";

$route['appointment']               = "Main_Controller/appointment";
$route['walk_in']                   = "Main_Controller/walk_in";

$route['queue_list']                = "Main_Controller/queue_list";

$route['consultation']              = "Main_Controller/consultation";

$route['settings']                  = "Main_Controller/settings";
$route['manage_roles']              = "Main_Controller/manage_roles";
$route['manage_service']            = "Main_Controller/manage_service";
$route['manage_vaccine']            = "Main_Controller/manage_vaccine";
$route['manage_privacy']            = "Main_Controller/manage_privacy";
$route['add_user']                  = "Main_Controller/add_user";
// $route['audit_result']              = "Main_Controller/audit_result";

$route['reports']                   = "Main_Controller/reports";

$route['worker_activity']           = "Main_Controller/worker_activity";

$route['create_appointment']        = "Main_Controller/create_appointment";
$route['user_appointment']          = "Main_Controller/user_appointment";
$route['user_med_history']          = "Main_Controller/user_medical_history";

$route['restricted']                = "Main_Controller/restricted";

$route['terms_conditions']                = "Login_Controller/terms_conditions";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

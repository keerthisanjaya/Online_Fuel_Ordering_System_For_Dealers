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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['return'] = 'Payments/thankyou';

//Login controller

$route['login/auth'] = 'Login/checklogin';
$route['register'] = 'Login/register';
$route['register/add'] = 'Login/registeruser';
$route['logout'] = 'Login/logout';
$route['forgetpasswordphone'] = 'Login/forgetpasswordphone';
$route['forgetpasswordphone/verify'] = 'Login/checkphone';
$route['forgetpassword/password'] = 'Users/forgetpasswordupdate';
$route['forgetpassword/update'] = 'Users/updatePassword';

//Otp controller
$route['otp'] = 'Otp/otppage';
$route['otp/verify'] = 'Otp/checkotp';
$route['otp/forget'] = 'Otp/forgetpage';
$route['otp/verify/forget'] = 'Otp/checkotpforget';

//Dashboard controller
$route['dashboard'] = 'Dashboard/dashboard';

//Vehicletype controller
$route['vehicletype'] = 'Vehicletype/index';
$route['vehicletype/insert'] = 'Vehicletype/formview';
$route['vehicletype/update/(:num)'] = 'Vehicletype/edit/$1';
$route['vehicletype/save'] = 'Vehicletype/create';
$route['vehicletype/edit/(:num)'] = 'Vehicletype/formupdate/$1';
$route['vehicletype/delete/(:num)'] = 'Vehicletype/delete/$1';

//Vehicle controller
$route['vehicle'] = 'Vehicle/index';
$route['vehicle/insert'] = 'Vehicle/formview';
$route['vehicle/update/(:num)'] = 'Vehicle/edit/$1';
$route['vehicle/save'] = 'Vehicle/create';
$route['vehicle/edit/(:num)'] = 'Vehicle/formupdate/$1';
$route['vehicle/delete/(:num)'] = 'Vehicle/delete/$1';
$route['vehicle/register'] = 'Vehicle/vehicleregistration';
$route['vehicle/register/save'] = 'Vehicle/vehicleregistrationsave';

//vehiclecalibrationcertificate controller
$route['vehiclecalibrationcertificate/'] = 'Vehiclecalibrationcertificate/index';
$route['vehiclecalibrationcertificate/insert'] = 'Vehiclecalibrationcertificate/vehiclecertification';
$route['vehiclecalibrationcertificate/update/(:num)'] = 'Vehiclecalibrationcertificate/edit/$1';
$route['vehiclecalibrationcertificate/save'] = 'Vehiclecalibrationcertificate/vehiclecertificatesave';
$route['vehiclecalibrationcertificate/edit/(:num)'] = 'Vehiclecalibrationcertificate/formupdate/$1';
$route['vehiclecalibrationcertificate/delete/(:num)'] = 'Vehiclecalibrationcertificate/delete/$1';

//Vehiclerevenuelicense Controller
$route['vehiclerevenuelicense/'] = 'Vehiclerevenuelicense/index';
$route['vehiclerevenuelicense/insert'] = 'Vehiclerevenuelicense/formview';
$route['vehiclerevenuelicense/update/(:num)'] = 'Vehiclerevenuelicense/edit/$1';
$route['vehiclerevenuelicense/save'] = 'Vehiclerevenuelicense/vehiclerevenueformsave';
$route['vehiclerevenuelicense/edit/(:num)'] = 'Vehiclerevenuelicense/formupdate/$1';
$route['vehiclerevenuelicense/delete/(:num)'] = 'Vehiclerevenuelicense/delete/$1';
$route['vehicle/certificate/revenuelicesen'] = 'Vehiclerevenuelicense/vehiclerevenueform';
$route['vehicle/certificate/revenuelicesen/save'] = 'Vehiclerevenuelicense/vehiclerevenueformsave';

// Location controller
$route['location/'] = 'Location/index';
$route['location/insert'] = 'Location/formview';
$route['location/update/(:num)'] = 'Location/edit/$1';
$route['location/save'] = 'Location/create';
$route['location/edit/(:num)'] = 'Location/formupdate/$1';
$route['location/delete/(:num)'] = 'Location/delete/$1';

//Loginlog controller
$route['loginlog/'] = 'Loginlog/index';
$route['loginlog/insert'] = 'Loginlog/formview';
$route['loginlog/update/(:num)'] = 'Loginlog/edit/$1';
$route['loginlog/save'] = 'Loginlog/create';
$route['loginlog/edit/(:num)'] = 'Loginlog/formupdate/$1';
$route['loginlog/delete/(:num)'] = 'Loginlog/delete/$1';

//Employeetype Controller
$route['employeetype/'] = 'Employeetype/index';
$route['employeetype/insert'] = 'Employeetype/formview';
$route['employeetype/update/(:num)'] = 'Employeetype/edit/$1';
$route['employeetype/save'] = 'Employeetype/create';
$route['employeetype/edit/(:num)'] = 'Employeetype/formupdate/$1';
$route['employeetype/delete/(:num)'] = 'Employeetype/delete/$1';

//Employee Controller
$route['employee/'] = 'Employee/index';
$route['employee/approval'] = 'Employee/empRegisterApproval';
$route['employee/insert'] = 'Employee/formview';
$route['employee/update/(:num)'] = 'Employee/edit/$1';
$route['employee/save'] = 'Employee/create';
$route['employee/edit/(:num)'] = 'Employee/formupdate/$1';
$route['employee/delete/(:num)'] = 'Employee/delete/$1';

$route['employee/register'] = 'Employee/applyasemployee';
$route['employee/register/save'] = 'Employee/employeesave';
$route['employee/register/approval/(:num)'] = 'Employee/empApproved/$1';
$route['employee/register/activate/(:num)'] = 'Employee/empApprovedActivate/$1';
$route['employee/register/deactivate/(:num)'] = 'Employee/empApprovedDeactivate/$1';


//Materialprice Controller
$route['materialprice/'] = 'Materialprice/index';
$route['materialprice/insert'] = 'Materialprice/formview';
$route['materialprice/update/(:num)'] = 'Materialprice/edit/$1';
$route['materialprice/save'] = 'Materialprice/create';
$route['materialprice/edit/(:num)'] = 'Materialprice/formupdate/$1';
$route['materialprice/delete/(:num)'] = 'Materialprice/delete/$1';

//Fillingstation Controller
$route['fuelstations/list/unapproved'] = 'Fillingstation/unapprovallist';
$route['fillingstation/view/doc/(:num)'] = 'Fillingstation/unapprovallistbyid/$1';
$route['fillingstation/approve/(:num)'] = 'Fillingstation/approve/$1';
$route['fuelstation/documents'] = 'Fillingstation/documents';
$route['fuelstation/documents/save'] = 'Fillingstation/uploaddocuments';

$route['fillingstation/'] = 'Fillingstation/index';
$route['fillingstation/insert'] = 'Fillingstation/formview';
$route['fillingstation/update/(:num)'] = 'Fillingstation/edit/$1';
$route['fillingstation/save'] = 'Fillingstation/create';
$route['fillingstation/edit/(:num)'] = 'Fillingstation/formupdate/$1';
$route['fillingstation/suspend/(:num)'] = 'Fillingstation/suspend/$1';
$route['fillingstation/customers'] = 'Fillingstation/pendingOrderViewCustomer';
$route['fillingstation/customers/acceptorder/(:num)'] = 'Fillingstation/btnorderaccepted/$1';

$route['dashboard'] = 'Dashboard/dashboard';

//Orders Controller
$route['fuelorders/placeorder'] = 'Orders/placeorders';
$route['fuelorders/placeorder/save'] = 'Orders/placeorderssave';
$route['orders/table'] = 'Orders/orderapprovaltbl';
$route['orders/assign/(:num)'] = 'Orders/selectmaterial/$1';
$route['orders/approve/(:num)'] = 'Orders/orderapproval/$1';
$route['orders/assign/toorder/(:num)'] = 'Orders/assignbousers/$1';
$route['orders/assign/driver'] = 'Orders/assigndriver';
$route['order/showtable'] = 'Orders/showtables';

$route['gantry/assign/(:num)'] = 'Orders/gantryselectmaterial/$1';
$route['gantry/fuel/(:num)'] = 'Orders/fillbousers/$1';
$route['gantry/fuel/complete'] = 'Orders/fuelcomplete';
$route['gantry/gantrydashboard'] = 'Orders/gantrydashboard';
$route['gate/open/(:num)'] = 'Orders/opengate/$1';

//security
$route['security/gate'] = 'Bowserassign/index';
$route['security/opengate/(:num)'] = 'Bowserassign/opengate/$1';

//pending orders


//Filling station related 
//Dailydip controller
$route['dailydip/'] = 'Dailydip/index';
$route['dailydip/reorder'] = 'Dailydip/reorderLevelCheck';
$route['dailydip/insert'] = 'Dailydip/formview';
$route['dailydip/update/(:num)'] = 'Dailydip/edit/$1';
$route['dailydip/save'] = 'Dailydip/create';
$route['dailydip/edit/(:num)'] = 'Dailydip/formupdate/$1';
$route['dailydip/delete/(:num)'] = 'Dailydip/delete/$1';
$route['dailydip/markdip/'] = 'Dailydip/markdip';
$route['dailydip/markdip/save'] = 'Dailydip/markdipsave';

//reportrelated

$route['report/'] = 'Report/index';
$route['report/emp'] = 'Report/empReport';
$route['report/log'] = 'Report/loginlog_report';
$route['report/calibration'] = 'Report/viewCalibration';
$route['report/fuelorder'] = 'Report/FuelOrderReport';
$route['report/bowserwise'] = 'Report/BowserwiseOrderReport';
$route['orders/orderItems'] ='Orders/view_order_items';
$route['orders/userorderItems'] ='Orders/view_order_item_users';
$route['Orders/printInvoice/(:num)'] = 'Orders/printInvoice/$1';


//usersrelated

$route['users/'] = 'Users/index';
$route['users/insert'] = 'Users/formview';
$route['users/update/(:num)'] = 'Users/edit/$1';
$route['users/save'] = 'Users/create';
$route['users/edit/(:num)'] = 'Users/formupdate/$1';
$route['users/delete/(:num)'] = 'Users/delete/$1';

$route['Users/formOwnupdate/'] = 'Users/formOwnupdate';
$route['Users/editOwnUserdata/(:num)'] = 'Users/editOwnUserdata/$1';
$route['users/pending'] = 'Users/pendingUser';
$route['Users/approveData/(:num)']= 'Users/approveUser/$1';













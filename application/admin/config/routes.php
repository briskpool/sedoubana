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
$route['default_controller'] = 'dist';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// routes for drivers.
$route['drivers']="drivers";
$route['change-status-drivers/(:num)']="drivers/changeStatusDrivers/$1";
$route['edit-drivers/(:num)']="drivers/editDrivers/$1";
$route['edit-drivers-post']="drivers/editDriversPost";
$route['delete-drivers/(:num)']="drivers/deleteDrivers/$1";
$route['add-drivers']="drivers/addDrivers";
$route['add-drivers-post']="drivers/addDriversPost";
$route['view-drivers/(:num)']="drivers/viewDrivers/$1";
$route['driver-subscription/(:num)']="drivers/viewDriverSubscription/$1";
// end of drivers routes
// routes for passenger.
$route['passengers']="passengers";
$route['change-status-passenger/(:num)']="passengers/changeStatusPassenger/$1";
$route['edit-passenger/(:num)']="passengers/editPassenger/$1";
$route['edit-passenger-post']="passengers/editPassengerPost";
$route['delete-passenger/(:num)']="passengers/deletePassenger/$1";
$route['add-passenger']="passengers/addPassenger";
$route['add-passenger-post']="passengers/addPassengerPost";
$route['view-passenger/(:num)']="passengers/viewPassenger/$1";
// end of passenger routes

// routes for rides.
$route['rides']="RidesController/rides";
$route['change-status-rides/(:num)']="RidesController/changeStatusRides/$1";
$route['edit-ride/(:num)']="RidesController/editRide/$1";
$route['edit-rides-post']="RidesController/editRidesPost";
$route['delete-ride/(:num)']="RidesController/deleteRide/$1";
$route['add-ride']="RidesController/addRide";
$route['add-rides-post']="RidesController/addRidesPost";
$route['view-ride/(:num)']="RidesController/viewRide/$1";
// end of rides routes

// routes for trips.
$route['tickets']="Tickets/Tickets";
$route['thread/(:num)']="Tickets/thread/$1";
$route['thread-chat']="Tickets/ThreadChat";
$route['change-status']="Tickets/changeStatus";
// end of trips routes
$route['forgot-password']="Auth/auth_forgot_password";
$route['reset-password']="Auth/reset_password";
$route['new-password/(:any)']="Auth/new_password/$1";
$route['change-password']="Auth/change_pass";
$route['password-changed']="Auth/pass_changed";

//settings
$route['settings']="Settings/Settings";
$route['settings/(:any)']="Settings/ViewSettings/$1";
$route['alerts']="Alerts/Alerts";
$route['create-alerts']="Alerts/CreateAlerts";
$route['view-alerts/(:num)']="Alerts/viewAlerts/$1";
$route['alert-send']="Alerts/AlertSend";


// routes for cites.
$route['cities']="CitiesController/ManageCites";
$route['change-status-cities/(:num)']="CitiesController/changeStatusCites/$1";
$route['edit-city/(:num)']="CitiesController/editCites/$1";
$route['edit-city-post']="CitiesController/editCitesPost";
$route['delete-city/(:num)']="CitiesController/deleteCites/$1";
$route['add-city']="CitiesController/addCites";
$route['add-city-post']="CitiesController/addCitesPost";
$route['view-city/(:num)']="CitiesController/viewCites/$1";
// end of cites routes

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


$route['default_controller'] = "homepage/index";
$route['404_override'] = 'homepage/index';
$route['translate_uri_dashes'] = FALSE;

/*********** USER DEFINED ROUTES *******************/
$route['QR/(:any)'] = 'QR/index/$1';
$route['qr/(:any)'] = 'qr/index/$1';
$route['id/(:any)'] = "ID/index/$1";
$route['showqr/(:any)'] = "Showqr/index/$1";

$route['homepage'] = 'homepage/index';
$route['homepage/(:any)'] = "homepage/index/$1";
$route['about'] = 'homepage/about';
$route['location/(:any)'] = "id/location/$1";
$route['hotel'] = "homepage/hotel";
$route['bag'] = 'homepage/bag';
$route['lost'] = 'homepage/lost';
$route['start'] = 'homepage/start';
$route['pay'] = 'homepage/pay';
$route['pay/subscription'] = 'homepage/subscription';

$servername = HOSTNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DATABASE;

//redirect('Https://tiqs.com/maintenance.html');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tbl_app_routes";
$result = $conn->query($sql);

$maintenance = false;

if (!empty($result)) {

	if ($maintenance === true) {
		foreach ($result as $row) {
			if ($row['vendorId'] == 0) {
				$route[strtolower($row['slug'])] = 'homepage/maintenance';
				$route[strtoupper($row['slug'])] = 'homepage/maintenance';
			}
			if ($row['vendorId'] != 0 && $row['spotId'] == 0) {
				$route[$row['slug']] = 'homepage/maintenance';
			}
			if ($row['vendorId'] != 0 && $row['spotId'] != 0) {
				$route[$row['slug']] = 'homepage/maintenance';
			}
		}
	}

	if ($maintenance === false) {
	foreach ($result as $row) {
			if ($row['vendorId'] == 0) {
				$route[$row['slug']] = $row['controller'] . "/" . urlencode($row['redirect']);
				$route[strtolower($row['slug'])] = $row['controller'] . "/" . urlencode($row['redirect']);
				$route[strtoupper($row['slug'])] = $row['controller'] . "/" . urlencode($row['redirect']);
			}
			if ($row['vendorId'] != 0 && $row['spotId'] == 0) {
				$route[$row['slug']] = $row['controller'] . "/" . $row['vendorId'];
			}
			if ($row['vendorId'] != 0 && $row['spotId'] != 0) {
				$route[$row['slug']] = $row['controller'] . "/" . $row['vendorId'] . "/" . $row['spotId'];
			}
		}
	}


} else {
	echo "No routes to follow....";
}

$conn->close();

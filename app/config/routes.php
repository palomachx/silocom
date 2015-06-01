<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "BaseController";
$route['404_override'] = '';
$route['login'] = 'BaseController/login';

# My Functionals Routes
$route['main'] = 'MainController';
$route['dashboard'] = 'DashboardController';

$route['songs'] = 'SongsController';
$route['songs/new'] = 'SongsController/newsong';
$route['songs/all'] = 'SongsController/getallsongs';
$route['songs/delete/(:num)'] = 'SongsController/delete_song/$1';

$route['playlist/new'] = 'PlaylistController/agregarPlaylist';

$route['singers'] = 'SingersController';
$route['singers/new'] = 'SingersController/newsinger';
$route['singers/all'] = 'SingersController/getallsingers';
$route['singers/delete/(:num)'] = 'SongsController/removeSinger/$1';

$route['users'] = 'UsersController';
$route['users/new'] = 'UsersController/newuser';
$route['users/all'] = 'UsersController/getallusers';

$route['kinds'] = 'GenrestypesController';
$route['genres/new'] = 'GenrestypesController/newgenre';
$route['genres/all'] = 'GenrestypesController/getallgenres';
$route['types/new'] = 'GenrestypesController/newtype';
$route['types/all'] = 'GenrestypesController/getalltypes';

$route['labels'] = 'LabelsController';
$route['labels/all'] = 'LabelsController/get';
$route['labels/new'] = 'LabelsController/newlabel';

/* End of file routes.php */
/* Location: ./application/config/routes.php */

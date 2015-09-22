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
$route['user']='user';
$route['user/(:any)']='user/$1';

$route['shop']='shop';
$route['shop/(:any)']='shop/$1';

$route['ex_cont']='ex_cont';
$route['ex_cont/(:any)']='ex_cont/$1';

$route['browser']='browser';
$route['browser/(:any)']='browser/$1';

$route['page/(:any)'] = 'page/index/$1';
$route['page'] = 'page';

$route['article']='article';
$route['article/(:any)']='article/index/$1/$2';

$route['post']='post';
$route['post/(:any)']='post/index/$1/$2';

$route['package']='package';
$route['package/(:any)']='package/index/$1/$2';

$route['location']='location';
$route['location/(:any)']='location/index/$1/$2';

$route['subscriber']='subscriber';
$route['subscriber/(:any)']='subscriber/index';

$route['gallery']='gallery';
$route['gallery/(:any)']='gallery/index';

$route['form']='form';
$route['form/(:any)']='form/$1';

$route['admin']='admin';
$route['admin/(:any)']='admin/$1';

$route['Enquiry-Form'] = 'form/enquire';

$route['(:any)'] = 'page/index/';

$route['default_controller'] = "page";
$route['404_override'] = '';

//$route[':any'] = "page/index/$1";
//$route['article:any'] = "article/index/$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
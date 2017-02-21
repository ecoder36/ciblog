<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['user/create'] = 'user/create';
$route['user/edit'] = 'user/edit/$1';
$route['user/index'] = 'user/index/$1';
$route['user'] = 'user/index';
//$route['default_controller'] = 'welcome';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

//$route['user/(:any)'] = 'user/new';


$route['register'] = 'user/register';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
//$route['users'] = 'users/login';


$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

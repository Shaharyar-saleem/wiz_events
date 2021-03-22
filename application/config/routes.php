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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Accounts
$route['login'] = 'user/Account/login';
$route['login/request'] = 'user/Account/login_request';
$route['signup'] = 'user/Account/signup';
$route['signup/request'] = 'user/Account/signup_request';
$route['forget'] = 'user/Account/forget';
$route['forget/request'] = 'user/Account/forget_request';
$route['reset/(:any)'] = 'user/Account/reset/$1';
$route['logout'] = 'user/Account/logout';
$route['user-profile/(:any)'] = 'user/Account/user_profile/$1';
$route['update/account'] = 'user/Account/update_profile';
$route['update-profile-image/request'] = 'user/Account/update_image_request';
$route['update-account/request'] = 'user/Account/update_account_request';
$route['file/upload'] = 'user/UserFile/file_upload_request';
$route['file/remove'] = 'user/UserFile/file_remove';



// under development pages by SHAHARAYAR
$route['profile'] = 'user/Account/test_profile';
$route['preview'] = 'user/Account/test_preview';
$route['notification-setting'] = 'user/Account/test_n_setting';
$route['profile-update'] = 'user/Account/test_p_update';
$route['git sew-comment'] = 'user/Account/test_comment';
// $route['blog'] = 'admin/Blog/test_admin_blog';





// Contact
$route['contact'] = 'user/StaticC/contact';
$route['careers'] = 'user/StaticC/careers';
// $route['news'] = 'user/StaticC/news';
$route['about'] = 'user/StaticC/about';

// Members
$route['members'] = 'user/Member/index';
$route['search-list-of-members'] = 'user/Member/search_list_members';
$route['follow/(:any)'] = 'user/Member/user_follow/$1';
$route['report/user/(:any)'] = 'user/Member/report_user/$1';


// Event
$route['create-event'] = 'user/Event/create_event';
$route['create-event/request'] = 'user/Event/create_event_request';
$route['my-event'] = 'user/Event/user_event';

// Event Finder
$route['event-finder'] = 'user/EventFinder/event_finder';
// News
$route['news/(:any)'] = 'user/NewsC/index/$1';
$route['news'] = 'user/NewsC/index';
$route['blog-like'] = 'user/NewsC/blog_like';

// Page created by shaharyar for see the each news
$route['view-news'] = 'user/NewsC/view_news';




// Notification
$route['notifications'] = 'user/Notification';

// Admin

$route['admin/login'] = 'admin/AuthC/login';
$route['admin/login/request'] = 'admin/AuthC/login_request';
$route['admin/forget'] = 'admin/AuthC/forget';
$route['admin/forget/request'] = 'admin/AuthC/forget_request';
$route['admin/reset/(:any)'] = 'admin/AuthC/reset/$1';
$route['admin/logout'] = 'admin/AuthC/logout';

$route['admin/dashboard'] = 'admin/Dashboard/index';
$route['admin/update/profile'] = 'admin/AuthC/update_profile';
$route['admin/update-image-request'] = 'admin/AuthC/update_profile_image';

// Blog
$route['admin/blog'] = 'admin/Blog/index';
$route['admin/add/blog'] = 'admin/Blog/add_blog';
$route['admin/update/blog/(:any)'] = 'admin/Blog/update_blog/$1';
$route['admin/archive/blog/(:any)'] = 'admin/Blog/archive_blog/$1';

// Admin User
$route['admin/user'] = 'admin/User/all_user';
$route['admin/add/user'] = 'admin/User/add_user';

// Wiz User
$route['admin/wiz-user'] = 'admin/WizUser/all_wiz_user';

// Wiz Event
$route['admin/wiz-event'] = 'admin/WizEvent/all_wiz_event';


// permission
$route['admin/group'] = 'permission/Group/all_group';
$route['admin/add/group'] = 'permission/Group/add_group';
$route['admin/update/group/(:any)'] = 'permission/Group/update_group/$1';
$route['admin/manage/permission'] = 'permission/Permission/manage_permission';
$route['admin/get-permission/(:any)'] = 'permission/Permission/get_permission/$1';
$route['admin/add/permission'] = 'permission/Permission/add_permission';
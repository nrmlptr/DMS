<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'document';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'document/view';
$route['imports'] = 'document/imports';
$route['add'] = 'document/add';
$route['delete/(:any)'] = 'document/delete/$1';

$route['upload/(:any)'] = 'document/upload/$1';
$route['notify/(:any)'] = 'document/sendExpiredEmailNotification/$1';

//buat route controller unggah manual data yang ada di kontroller tersebut
$route['viewData'] = 'unggah';
$route['uploadData'] = 'unggah/create';
$route['prosesUpload'] = 'unggah/proses';

//buat route controller untuk mengelola master data karyawan
// $route['viewKaryawan'] = 'document/showKaryawan';
// $route['addKar'] = 'document/addKaryawan';
// $route['loadKar'] = 'document/loadAddKaryawan';
// $route['loadEdKar'] = 'document/loadEditKaryawan';


//buat route controller untuk mengelola master data shift
// $route['viewShift'] = 'document/showShift';
// $route['loadEdSh'] = 'document/loadEditShift';

// $route['ProsWWT'] = 'produksi/prosesWWT';
// $route['ShowWWT'] = 'produksi/showDataPWWT';
// $route['loadMat'] = 'produksi/loadAddMaterial';

//buat route controller unggah sop
$route['viewDataSOP'] = 'unggah/viewSOP';
$route['uploadDataSOP'] = 'unggah/createSOP';
$route['prosesUploadSOP'] = 'unggah/prosessOP';


//buat route controller unggah msds
$route['viewDataMSDS'] = 'unggah/viewMSDS';
$route['uploadDataMSDS'] = 'unggah/createMSDS';
$route['prosesUploadMSDS'] = 'unggah/prosesMSDS';

//buat route controller unggah ik
$route['viewDataIK'] = 'unggah/viewIK';
$route['uploadDataIK'] = 'unggah/createIK';
$route['prosesUploadIK'] = 'unggah/prosesIK';

//buat route controller unggah iad k3
$route['viewDataIAD'] = 'unggah/viewIAD';
$route['uploadDataIAD'] = 'unggah/createIAD';
$route['prosesUploadIAD'] = 'unggah/prosesIAD';

//buat route controller unggah ik
$route['viewDataForm'] = 'unggah/viewFORM';
$route['uploadDataForm'] = 'unggah/createFORM';
$route['prosesUploadFORM'] = 'unggah/prosesFORM';

//=====================doc lisensi routes====================
$route['homeLisensi'] = 'document/viewLisensi';
$route['importsLisensi'] = 'document/importsLisensi';
$route['addLisensi'] = 'document/addLisensi';
$route['deleteLisensi/(:any)'] = 'document/deleteLisensi/$1';
$route['editLisensi/(:any)'] = 'document/editLisensi/$1';
$route['loadEdLis'] = 'document/loadEditMaber';

$route['uploadLisensi/(:any)'] = 'document/uploadLisensi/$1';
$route['notifyLisensi/(:any)'] = 'document/sendExpiredEmailNotificationLisensi/$1';

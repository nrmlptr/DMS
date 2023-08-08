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

//=====================doc riksa uji routes===============================================
$route['home']                      = 'document/view';
$route['imports']                   = 'document/imports';
$route['add']                       = 'document/add';
$route['delete/(:any)']             = 'document/delete/$1';
$route['edit/(:any)']               = 'document/edit/$1';
$route['loadEd']                    = 'document/loadEdit';

$route['upload/(:any)']             = 'document/upload/$1';
$route['notify/(:any)']             = 'document/sendExpiredEmailNotification/$1';

//================= controller upload doc manual routes=================================== 
$route['viewData']                  = 'unggah';
$route['uploadData']                = 'unggah/create';
$route['prosesUpload']              = 'unggah/proses';

//=====================master data karyawan routes========================================
// $route['viewKaryawan']           = 'document/showKaryawan';
// $route['addKar']                 = 'document/addKaryawan';
// $route['loadKar']                = 'document/loadAddKaryawan';
// $route['loadEdKar']              = 'document/loadEditKaryawan';

//================= controller upload sop routes========================================== 
$route['viewDataSOP']               = 'unggah/viewSOP';
$route['uploadDataSOP']             = 'unggah/createSOP';
$route['prosesUploadSOP']           = 'unggah/prosessOP';

//================= controller upload msds routes========================================= 
$route['viewDataMSDS']              = 'unggah/viewMSDS';
$route['uploadDataMSDS']            = 'unggah/createMSDS';
$route['prosesUploadMSDS']          = 'unggah/prosesMSDS';

//================= controller upload ik routes=========================================== 
$route['viewDataIK']                = 'unggah/viewIK';
$route['uploadDataIK']              = 'unggah/createIK';
$route['prosesUploadIK']            = 'unggah/prosesIK';

//================= controller upload iadk3 routes======================================== 
$route['viewDataIAD']               = 'unggah/viewIAD';
$route['uploadDataIAD']             = 'unggah/createIAD';
$route['prosesUploadIAD']           = 'unggah/prosesIAD';

//================= controller upload form routes========================================= 
$route['viewDataForm']              = 'unggah/viewFORM';
$route['uploadDataForm']            = 'unggah/createFORM';
$route['prosesUploadFORM']          = 'unggah/prosesFORM';

//================= controller upload video edukasi lk3 routes============================ 
$route['viewDataVideo']             = 'unggah/viewVIDEO';
$route['uploadDataVideo']           = 'unggah/createVIDEO';
$route['prosesUploadVIDEO']         = 'unggah/prosesVIDEO';

//=====================doc lisensi routes=================================================
$route['homeLisensi']               = 'document/viewLisensi';
$route['importsLisensi']            = 'document/importsLisensi';
$route['addLisensi']                = 'document/addLisensi';
$route['deleteLisensi/(:any)']      = 'document/deleteLisensi/$1';
$route['editLisensi/(:any)']        = 'document/editLisensi/$1';
$route['loadEdLis']                 = 'document/loadEditMaber';

$route['uploadLisensi/(:any)']      = 'document/uploadLisensi/$1';
$route['notifyLisensi/(:any)']      = 'document/sendExpiredEmailNotificationLisensi/$1';

//===================== download video si routes ==========================================
$route['getVideo']                  = 'unggah/getVideoSI';

//===================== history get routes ================================================
$route['getHistory']                = 'document/getHistoryUser';
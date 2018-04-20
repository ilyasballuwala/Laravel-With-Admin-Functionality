<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Add new routes for admin login, registration, forgot and reset password
Route::get('/admin','Adminauth\LoginController@showLoginForm');
Route::get('/admin/login','Adminauth\LoginController@showLoginForm');
Route::post('/admin/login','Adminauth\LoginController@adminLogin');
Route::get('/admin/forgotpassword','Adminauth\ForgotPasswordController@showForgotPasswordForm');
Route::post('/admin/password/email','Adminauth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/admin/password/reset/{token}', 'Adminauth\ResetPasswordController@showResetPasswordForm')->name('admin.password.token');
Route::post('/admin/password/reset', 'Adminauth\ResetPasswordController@reset');

// Add new route for 'admin' middleware
Route::group(['middleware' => ['admin']],function(){
	
	// Logout routes
    Route::post('/admin/logout','Adminauth\LoginController@logout');
	Route::get('/admin/logout','Adminauth\LoginController@logout');

	// Change password routes 
	Route::get('/admin/changepass','admin\AdminController@getChangePass');
	Route::post('/admin/changepass','admin\AdminController@changePass');
	
	// Change Profile routes
	Route::get('/admin/editprofile','admin\AdminController@profile');
	Route::post('/admin/updateprofile','admin\AdminController@postprofile');
	
	//Admin Module Routes
	Route::get('/admin/dashboard','admin\AdminController@index');
	Route::resource('admin/relationshipmanager', 'admin\RelationshipManagerController',['except' => ['destroy']]);
	
	//Common Delete Route
	Route::get('admin/delete/{controller?}/{table?}/{field?}/{id?}', 'admin\Controller@generaldelete')->where(['table' => '[a-z_]+', 'id' => '[0-9]+']);
	
});

Route::prefix('api/v1')->group(function() {
	Route::post('/globalaction', 'api\APIController@index');
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
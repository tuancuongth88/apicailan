<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('admin.layout.login');
});

Route::group(['prefix' => 'admin'], function () {
{
	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout',  'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');

	Route::get('user/resPassword', array('uses' => 'UserController@resPassword'));
	Route::resource('/user', 'UserController');
    Route::resource('/thongke', 'ThongKeController');
    Route::post('/findByParam', 'ThongKeController@findByParam');
}
});

Route::group(['prefix' => 'api'], function () {
	Route::get('/login', 'LoginController@getLogin');
	Route::post('/login', 'LoginController@postLogin');
	Route::post('/logout', 'LogoutController@logout');
	Route::get('/register', 'RegisterController@index');
	Route::post('/register', 'RegisterController@store');
    Route::post('/importcan', 'ApiImportManagement@importBangCan');
    Route::post('/importkiemdinh', 'ApiImportManagement@importKiemDinh');
    Route::post('/importkhachhang', 'ApiImportManagement@importKhachHang');
    Route::post('/import', 'ApiImportManagement@store');

});


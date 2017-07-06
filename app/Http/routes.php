<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('admin/login','Admin\LoginController@login');

Route::get('admin/code','Admin\LoginController@code');

Route::post('admin/dologin','Admin\LoginController@dologin');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'],function(){

	Route::get('quit','IndexController@quit');
	Route::get('info','LoginController@info');
	Route::get('repass','IndexController@repass');
	Route::post('dopass','IndexController@dopass');
	Route::get('index','LoginController@index');
	Route::resource('user','UserController');
	Route::resource('cate','CateController');
});
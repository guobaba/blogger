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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/crypt','Admin\LoginController@crypt');
// 后台登录页
Route::get('/admin/login','Admin\LoginController@login');
// 验证码
Route::get('/admin/code','Admin\LoginController@code');

// 处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'],function(){
    // 退出登录
    Route::get('quit','IndexController@quit');
    // 修改密码
    Route::get('repass','IndexController@repass');
    Route::post('dorepass','IndexController@dorepass');

    // 后台首页
    Route::get('index','LoginController@index');
    Route::get('info','LoginController@info');

    // 用户模块
    Route::resource('user','UserController');

    // 分类模块
    Route::resource('cate','CateController');

    // 网站配置
    Route::resource('config','ConfigController');
    Route::any('config/changeorder','ConfigController@changeOrder');

    // 网站配置内容修改路由
    Route::any('config/changecontent','ConfigController@changeContent');
});


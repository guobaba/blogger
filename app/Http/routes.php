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

//前台注册
Route::controller('/home/zhuce','Home\ZhuceController');
//前台登录
Route::controller('/home/login','Home\LoginController');
// 订阅
Route::post('/home/subscibe','Home\SubscibeController@subscibe');

// 退订
Route::controller('/subscibe','Home\SubscibeController');

//个人信息页路由
Route::controller('/home/info','Home\InfoController');
    // 前台路由
    Route::group(['namespace'=>'Home'],function(){
    // 前台首页
	Route::get('/','IndexController@index');
	// 列表页路由
	Route::get('/cate','IndexController@cate');
	// 详情页路由
	Route::get('a/{id}','IndexController@article');
    Route::post('/dis/{id}','IndexController@dis');
});

//如果权限不够，重定向路由
Route::get('/back',function(){
    return view('errors.403');
});

Route::get('/admin/crypt','Admin\LoginController@crypt');
// 后台登录页
Route::get('/admin/login','Admin\LoginController@login');
// 验证码
Route::get('/admin/code','Admin\LoginController@code');
Route::get('/test','Admin\IndexController@test');

// 处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login']],function(){
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
    // 禁言
    Route::get('shutup','UserController@shutup');

    // 查看个人信息
    Route::resource('personal','PersonalController');


    // 分类模块
    Route::resource('cate','CateController');
    Route::any('cate/changeorder','CateController@changeOrder');

    //文章模块
    Route::resource('article','ArticleController');
    Route::any('article/changeorder','ArticleController@changeOrder');
    Route::any('upload','ArticleController@upload');
    Route::any('email','ArticleController@email');



    //留言管理
    Route::get('dis/index','DisController@index');
    Route::any('dis/delete/{id}','DisController@delete');
    Route::any('dis/insert/{id}','DisController@insert');
    Route::any('dis/reply/{id}','DisController@reply');


    // 网站配置
    Route::resource('config','ConfigController');
    Route::any('config/changeorder','ConfigController@changeOrder');

    // 网站配置内容修改路由
    Route::any('config/changecontent','ConfigController@changeContent');
    // 友情链接
    Route::resource('link','LinkController');
    Route::any('link/changeorder','LinkController@changeOrder');

    //通告管理
 //   Route::resource('ann','AnnController');
  //  Route::any('ann/changeorder','AnnController@changeOrder');

    // 角色模块
    Route::resource('role','RoleController');

    // 权限模块路由 对权限进行增删改查
    Route::resource('permission','PermissionController');

    // 用户授权路由
    Route::get('auth/{id}','UserController@auth');
    // 给用户添加角色
    Route::post('auth/add','UserController@add');

    // 给角色添加权限
    Route::get('roleauth','RoleController@addPermission');
    Route::post('doroleauth','RoleController@doAddPermission');

    // 网站导航
    Route::resource('nav','NavController');
    Route::any('nav/changeorder','NavController@changeOrder');

    //广告模块
    Route::resource('adv','AdvController');
    Route::any('adv/changeorder','AdvController@changeOrder');
    Route::any('upload','AdvController@upload');
});
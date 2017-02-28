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

Route::get('/', 'IndexController@index')->name('index');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', 'RegisterController@create');
    Route::post('register', 'RegisterController@store');
    Route::get('login', 'LoginController@create')->name('login');
    Route::post('login', 'LoginController@store');
    Route::post('logout', 'LoginController@destroy');
    Route::group(['prefix' => 'password/reset'], function () {
        Route::get('/', 'ResetPasswordController@index');
        Route::post('/', 'ResetPasswordController@store');
        Route::patch('/', 'ResetPasswordController@update');
    });
});

Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('messages', 'MessageController@index');
    // // Route::get('logs', '');
    Route::group(['prefix' => 'info'], function () {
        Route::get('/', 'InfoController@index');
        Route::get('edit', 'InfoController@edit');
        Route::patch('/', 'InfoController@update');
    });
    Route::group(['prefix' => 'uploads'], function () {
        Route::get('/', 'UploadController@index');
        Route::get('create', 'UploadController@create');
        Route::post('/', 'UploadController@store');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrderController@index');
        Route::get('create', 'OrderController@create');
        Route::post('/', 'OrderController@store');
    });
    Route::group(['prefix' => 'username'], function () {
        Route::get('/', 'UsernameController@index'); // 修改用户名页面
        Route::post('edit/old', 'UsernameController@sendToOld'); // 发送验证码到旧手机号
        // Route::post('edit', ''); // 提交验证码
        // Route::post('edit/new', ''); // 发送验证码到新手机号
        Route::patch('/', 'UsernameController@update'); // 提交验证码2，并修改用户名
    });
    Route::group(['prefix' => 'password'], function () {
        Route::get('edit', 'PasswordController@edit');
        Route::patch('/', 'PasswordControlel@update');
    });
    Route::group(['prefix' => 'shop', 'namespace' => 'Shop'], function () {
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index');
            Route::get('{id}/download', 'OrderController@download');
            Route::post('{id}/finish', 'OrderController@finish');
        });
    });
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index');
            Route::patch('{id}', 'UserController@update');
        });
        Route::group(['prefix' => 'code'], function () {
            Route::get('/', 'CodeController@create');
            Route::post('/', 'CodeController@store');
        });
    });
});

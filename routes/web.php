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
//     Route::group(['prefix' => 'uploads'], function () {
//         Route::get('/', '');
//         Route::get('create', '');
//         Route::post('/', '');
//     });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrderController@index');
        // Route::get('create', '');
        // Route::post('/', '');
        // Route::get('{id}', '');
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
//     Route::group(['prefix' => 'shop', 'namespace' => 'Shop'], function () {
//         Route::get('/', '');
//         Route::group(['prefix' => 'orders'], function () {
//             Route::get('/', '');
//             Route::get('{id}', '');
//             Route::post('{id}/download', '');
//             Route::patch('{id}', '');
//         });
//     });
//     Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//         Route::get('/', '');
//         Route::group(['prefix' => 'users'], function () {
//             Route::get('/', '');
//         });
//         Route::group(['prefix' => 'code'], function () {
//             Route::get('/', '');
//             Route::get('create', '');
//             Route::post('/', '');
//         });
//     });
});

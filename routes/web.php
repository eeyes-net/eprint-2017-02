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

// Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
//     Route::get('register', '');
//     Route::post('register', '');
//     Route::get('login', '')->name('login');
//     Route::post('login', '');
//     Route::post('logout', '');
//     Route::get('password_reset', '');
//     Route::post('password_reset', '');
// });
//
// Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
//     Route::get('/', '')->name('home');
//     Route::patch('/', '');
//     Route::get('messages', '');
//     Route::get('logs', '');
//     Route::group(['prefix' => 'uploads'], function () {
//         Route::get('/', '');
//         Route::get('create', '');
//         Route::post('/', '');
//     });
//     Route::group(['prefix' => 'orders'], function () {
//         Route::get('/', '');
//         Route::get('create', '');
//         Route::post('/', '');
//         Route::get('{id}', '');
//     });
//     Route::group(['prefix' => 'info'], function () {
//         Route::get('edit', '');
//         Route::patch('/', '');
//     });
//     Route::group(['prefix' => 'username'], function () {
//         Route::get('edit', ''); // 修改用户名页面
//         Route::post('edit/1/send', ''); // 发送验证码1
//         Route::post('edit/1', ''); // 提交验证码1
//         Route::post('edit/2/send', ''); // 发送验证码2
//         Route::patch('/', ''); // 提交验证码2，并修改用户名
//     });
//     Route::group(['prefix' => 'password'], function () {
//         Route::get('edit', '');
//         Route::patch('/', '');
//     });
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
// });

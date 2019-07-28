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

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('app/create', 'Admin\MyAppController@add');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('app/create', 'Admin\MyAppController@add');
     Route::post('app/create', 'Admin\MyAppController@create');
     Route::get('app', 'Admin\MyAppController@index');
     Route::get('app/edit', 'Admin\MyAppController@edit');
     Route::post('app/edit', 'Admin\MyAppController@update');
     Route::get('app/delete', 'Admin\MyAppController@delete');
});
/*---- 動画配信用のテストコード ----*/
// Route::get('video/stream', 'VideoController@stream');

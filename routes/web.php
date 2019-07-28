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
     Route::get('news/edit', 'Admin\MyAppController@edit');
     Route::post('news/edit', 'Admin\MyAppController@update');

});
/*---- 動画配信用のテストコード ----*/
// Route::get('video/stream', 'VideoController@stream');

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
Route::any('admin/public/login','admin\PublicController@login')->name('admin.public.index');
Route::post('admin/public/check','admin\PublicController@check')->name('admin.check.login');
Route::group(['prefix' => 'admin','namespace' =>'admin','middleware'=>'login'], function () { 
    Route::get('index/index','IndexController@index')->name('index.index');
    Route::get('index/welcome','IndexController@welcome')->name('index.welcome');
    Route::get('public/logout','PublicController@check')->name('public.logout');
});

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
    //运动员列表
    Route::get('athletes/index','AthletesController@index')->name('athletes.index');
    //添加运动员
    Route::any('athletes/add','AthletesController@add')->name('athletes.add');
    Route::get('math/index','MathController@index')->name('math.index');
    Route::any('math/add','MathController@add')->name('math.add');
    //管理员列表
    Route::get('admin/index','AdminController@index')->name('admin.index');
    //添加管理员
    Route::get('admin/index','AdminController@index')->name('admin.index');
});

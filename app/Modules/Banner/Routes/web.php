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



Route::group(['prefix' => 'admin', 'middleware' => ['auth','permission']], function () {
    
       
    Route::get('banner', ['as' => 'banner.index', 'uses' => 'BannerController@index']);

    Route::get('banner/create', ['as' => 'banner.create', 'uses' => 'BannerController@create']);
    Route::post('banner/store', ['as' => 'banner.store', 'uses' => 'BannerController@store']);

    Route::get('banner/edit/{id}', ['as' => 'banner.edit', 'uses' => 'BannerController@edit'])->where('id','[0-9]+');
    Route::put('banner/update/{id}', ['as' => 'banner.update', 'uses' => 'BannerController@update'])->where('id','[0-9]+');

    Route::get('banner/delete/{id}', ['as' => 'banner.delete', 'uses' => 'BannerController@destroy'])->where('id','[0-9]+');
        
         
});
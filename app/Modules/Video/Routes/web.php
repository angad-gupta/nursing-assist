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
    
       
    Route::get('video', ['as' => 'video.index', 'uses' => 'VideoController@index']);

    Route::get('video/create', ['as' => 'video.create', 'uses' => 'VideoController@create']);
    Route::post('video/store', ['as' => 'video.store', 'uses' => 'VideoController@store']);

    Route::get('video/edit/{id}', ['as' => 'video.edit', 'uses' => 'VideoController@edit'])->where('id','[0-9]+');
    Route::put('video/update/{id}', ['as' => 'video.update', 'uses' => 'VideoController@update'])->where('id','[0-9]+');

    Route::get('video/delete/{id}', ['as' => 'video.delete', 'uses' => 'VideoController@destroy'])->where('id','[0-9]+');
        
         
});
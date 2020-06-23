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
    
       
    Route::get('announcement', ['as' => 'announcement.index', 'uses' => 'AnnouncementController@index']);

    Route::get('announcement/create', ['as' => 'announcement.create', 'uses' => 'AnnouncementController@create']);
    Route::post('announcement/store', ['as' => 'announcement.store', 'uses' => 'AnnouncementController@store']);

    Route::get('announcement/edit/{id}', ['as' => 'announcement.edit', 'uses' => 'AnnouncementController@edit'])->where('id','[0-9]+');
    Route::put('announcement/update/{id}', ['as' => 'announcement.update', 'uses' => 'AnnouncementController@update'])->where('id','[0-9]+');

    Route::get('announcement/delete/{id}', ['as' => 'announcement.delete', 'uses' => 'AnnouncementController@destroy'])->where('id','[0-9]+');
        
         
});
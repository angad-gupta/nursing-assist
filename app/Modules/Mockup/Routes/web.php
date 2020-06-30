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
    
       
    Route::get('mockup', ['as' => 'mockup.index', 'uses' => 'MockupController@index']);

    Route::get('mockup/create', ['as' => 'mockup.create', 'uses' => 'MockupController@create']);
    Route::post('mockup/store', ['as' => 'mockup.store', 'uses' => 'MockupController@store']);

    Route::get('mockup/edit/{id}', ['as' => 'mockup.edit', 'uses' => 'MockupController@edit'])->where('id','[0-9]+');
    Route::put('mockup/update/{id}', ['as' => 'mockup.update', 'uses' => 'MockupController@update'])->where('id','[0-9]+');

    Route::get('mockup/delete/{id}', ['as' => 'mockup.delete', 'uses' => 'MockupController@destroy'])->where('id','[0-9]+');
        
         
});
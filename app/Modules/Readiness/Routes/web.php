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
    
       
    Route::get('readiness', ['as' => 'readiness.index', 'uses' => 'ReadinessController@index']);

    Route::get('readiness/create', ['as' => 'readiness.create', 'uses' => 'ReadinessController@create']);
    Route::post('readiness/store', ['as' => 'readiness.store', 'uses' => 'ReadinessController@store']);

    Route::get('readiness/edit/{id}', ['as' => 'readiness.edit', 'uses' => 'ReadinessController@edit'])->where('id','[0-9]+');
    Route::put('readiness/update/{id}', ['as' => 'readiness.update', 'uses' => 'ReadinessController@update'])->where('id','[0-9]+');

    Route::get('readiness/delete/{id}', ['as' => 'readiness.delete', 'uses' => 'ReadinessController@destroy'])->where('id','[0-9]+');
        
         
});
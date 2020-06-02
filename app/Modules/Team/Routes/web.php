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
    
       
    Route::get('team', ['as' => 'team.index', 'uses' => 'TeamController@index']);

    Route::get('team/create', ['as' => 'team.create', 'uses' => 'TeamController@create']);
    Route::post('team/store', ['as' => 'team.store', 'uses' => 'TeamController@store']);

    Route::get('team/edit/{id}', ['as' => 'team.edit', 'uses' => 'TeamController@edit'])->where('id','[0-9]+');
    Route::put('team/update/{id}', ['as' => 'team.update', 'uses' => 'TeamController@update'])->where('id','[0-9]+');

    Route::get('team/delete/{id}', ['as' => 'team.delete', 'uses' => 'TeamController@destroy'])->where('id','[0-9]+');
        
         
});
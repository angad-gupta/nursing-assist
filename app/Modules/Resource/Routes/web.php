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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'permission']], function () {

    /*
    |--------------------------------------------------------------------------
    | Resource  CRUD ROUTE
    |--------------------------------------------------------------------------
     */
    Route::get('resource', ['as' => 'resource.index', 'uses' => 'ResourceController@index']);
    // Resource Create
    Route::get('resource/create', ['as' => 'resource.create', 'uses' => 'ResourceController@create']);
    Route::post('resource/store', ['as' => 'resource.store', 'uses' => 'ResourceController@store']);
    // Resource Edit
    Route::get('resource/edit/{id}', ['as' => 'resource.edit', 'uses' => 'ResourceController@edit'])->where('id', '[0-9]+');
    Route::patch('resource/update/{id}', ['as' => 'resource.update', 'uses' => 'ResourceController@update'])->where('id', '[0-9]+');
    // Resource Delete
    Route::get('resource/delete/{id}', ['as' => 'resource.delete', 'uses' => 'ResourceController@destroy'])->where('id', '[0-9]+');
});

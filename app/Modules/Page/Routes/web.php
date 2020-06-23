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

Route::group(['prefix' => 'admin', 'middleware' => ['auth','web','permission']], function () {

        /*
        |--------------------------------------------------------------------------
        | page  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('page', ['as' => 'page.index', 'uses' => 'PageController@index']);
        // page Create
        Route::get('page/create', ['as' => 'page.create', 'uses' => 'PageController@create']);
        Route::post('page/store', ['as' => 'page.store', 'uses' => 'PageController@store']);
        // page Edit
        Route::get('page/edit/{id}', ['as' => 'page.edit', 'uses' => 'PageController@edit'])->where('id','[0-9]+');
        Route::put('page/update/{id}', ['as' => 'page.update', 'uses' => 'PageController@update'])->where('id','[0-9]+');
        // page Delete
        Route::get('page/delete/{id}', ['as' => 'page.delete', 'uses' => 'PageController@destroy'])->where('id','[0-9]+');

});

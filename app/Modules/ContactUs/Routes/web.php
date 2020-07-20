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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission']], function () {

    Route::get('contactus', ['as' => 'contactus.index', 'uses' => 'ContactUsController@index']);

    Route::get('contactus/viewUser', ['as' => 'contactus.viewUser', 'uses' => 'ContactUsController@viewUser']);

    Route::get('contactus/delete/{id}', ['as' => 'contactus.delete', 'uses' => 'ContactUsController@destroy'])->where('id', '[0-9]+');

    Route::post('contactus/update-status', ['as' => 'contactus.updateStatus', 'uses' => 'ContactUsController@updateStatus']);
});

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
    
       
    Route::get('registration', ['as' => 'registration.index', 'uses' => 'RegistrationController@index']);

    Route::get('registration/delete/{id}', ['as' => 'registration.delete', 'uses' => 'RegistrationController@destroy'])->where('id', '[0-9]+');

    Route::post('registration/storeEnrollment', ['as' => 'registration.storeEnrollment', 'uses' => 'RegistrationController@storeEnrollment']);

         
});
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
    
       
    Route::get('enrolment', ['as' => 'enrolment.index', 'uses' => 'EnrolmentController@index']);
        
	Route::get('enrolment/viewUser',['as' => 'enrolment.viewUser', 'uses' => 'EnrolmentController@viewUser']);
      
});

        

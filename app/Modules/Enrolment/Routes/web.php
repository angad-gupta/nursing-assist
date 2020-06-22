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

        
     Route::post('enrolmentstudent/store', ['as' => 'enrolmentstudent.store', 'uses' => 'EnrolmentController@store']);

     Route::get('enrolmentstudent/cancel', ['as' => 'enrolmentstudent.cancel', 'uses' => 'EnrolmentController@cancel']);

     Route::get('enrolmentstudent/redirect/{id}', ['as' => 'enrolmentstudent.redirect', 'uses' => 'EnrolmentController@redirect']);

     Route::get('enrolmentstudent/sucess/{transaction_id}', ['as' => 'enrolmentstudent.sucess', 'uses' => 'EnrolmentController@sucess']);

     Route::get('enrolmentstudent/error/{transaction_id}', ['as' => 'enrolmentstudent.error', 'uses' => 'EnrolmentController@error']);



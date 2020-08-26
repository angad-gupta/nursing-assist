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

    Route::get('enrolment', ['as' => 'enrolment.index', 'uses' => 'EnrolmentController@index']);
    Route::get('enrolment/archive', ['as' => 'enrolment.indexArchive', 'uses' => 'EnrolmentController@indexArchive']);

    Route::get('enrolment/delete/{id}', ['as' => 'enrolment.delete', 'uses' => 'EnrolmentController@destroy'])->where('id', '[0-9]+');

    Route::get('enrolment/viewUser', ['as' => 'enrolment.viewUser', 'uses' => 'EnrolmentController@viewUser']);

    Route::post('enrolment/update-status', ['as' => 'enrolment.updateStatus', 'uses' => 'EnrolmentController@updateStatus']);


});

Route::post('enrolmentstudent/store', ['as' => 'enrolmentstudent.store', 'uses' => 'EnrolmentController@store']);

Route::post('enrolmentstudent/paylater_store', ['as' => 'enrolmentstudent.paylater.store', 'uses' => 'EnrolmentController@payLaterStore']);

Route::get('enrolmentstudent/cancel', ['as' => 'enrolmentstudent.cancel', 'uses' => 'EnrolmentController@cancel']);

Route::get('enrolmentstudent/redirect/{id}', ['as' => 'enrolmentstudent.redirect', 'uses' => 'EnrolmentController@redirect']);

Route::get('enrolmentstudent/sucess/{transaction_id}', ['as' => 'enrolmentstudent.sucess', 'uses' => 'EnrolmentController@sucess']);

Route::get('enrolmentstudent/error', ['as' => 'enrolmentstudent.error', 'uses' => 'EnrolmentController@error']);

//installment payment form
Route::get('enrolment/installment/pay', ['as' => 'enrolment.installment.pay', 'uses' => 'EnrolmentController@viewInstallmentForm']);
//Route::post('enrolment/installment/pay/store', ['as' => 'enrolment.installment.pay.store', 'uses' => 'EnrolmentController@installmentPayment']);

//3ds sample
Route::get('enrolment/payment_3ds', ['as' => 'enrolment.payment_3ds', 'uses' => 'EnrolmentController@payment_3ds']);
Route::post('enrolment/payment_3ds/pay', ['as' => 'enrolment.3ds.pay', 'uses' => 'EnrolmentController@payPayment']);
Route::post('enrolment/payment_3ds/complete', ['as' => 'enrolment.3ds.complete', 'uses' => 'EnrolmentController@completePayment']);
Route::post('enrolment/payment_3ds/installment/store', ['as' => 'enrolment.3ds.installment.store', 'uses' => 'EnrolmentController@installmentPayment']);


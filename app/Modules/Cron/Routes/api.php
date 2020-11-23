<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('enrolment/installment', ['as' => 'enrolment.installment', 'uses' => 'CronController@installmentNotification']);
Route::get('enrolment/nclex-installment', ['as' => 'enrolment.installment', 'uses' => 'CronController@nclexInstallmentNotification']);
Route::get('mockuphistory', ['as' => 'mockuphistory', 'uses' => 'CronController@updateStudentMockupHistory']);
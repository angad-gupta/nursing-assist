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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('about-us', ['as' => 'about-us', 'uses' => 'HomeController@AboutUs']);

Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'HomeController@ContactUs']);

Route::post('contactus/store', ['as' => 'contactus.store', 'uses' => 'HomeController@storeContact']);

Route::get('enrolment', ['as' => 'enrolment', 'uses' => 'HomeController@Enrolment']);

Route::post('enrolment/store', ['as' => 'enrolment.store', 'uses' => 'HomeController@storeEnrolment']);

Route::get('course', ['as' => 'course', 'uses' => 'HomeController@Course']);

Route::get('course-detail', ['as' => 'course-detail', 'uses' => 'HomeController@courseDetail']);

Route::get('course-info-detail', ['as' => 'course-info-detail', 'uses' => 'HomeController@courseInfoDetail']);

Route::get('term-condition', ['as' => 'term-condition', 'uses' => 'HomeController@termCondition']);



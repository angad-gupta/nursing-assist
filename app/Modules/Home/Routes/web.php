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

Route::get('home', ['as' => 'login', 'uses' => 'LoginController@login']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('about-us', ['as' => 'about-us', 'uses' => 'HomeController@AboutUs']);

Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'HomeController@ContactUs']);

Route::get('faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);

Route::get('agent', ['as' => 'agent', 'uses' => 'HomeController@agent']);

Route::post('contactus/store', ['as' => 'contactus.store', 'uses' => 'HomeController@storeContact']);

Route::get('enrolment', ['as' => 'enrolment', 'uses' => 'HomeController@Enrolment']);

Route::post('enrolment/store', ['as' => 'enrolment.store', 'uses' => 'HomeController@storeEnrolment']);

Route::get('course', ['as' => 'course', 'uses' => 'HomeController@Course']);

Route::get('course-detail', ['as' => 'course-detail', 'uses' => 'HomeController@courseDetail']);

Route::get('course-info-detail', ['as' => 'course-info-detail', 'uses' => 'HomeController@courseInfoDetail']);

Route::get('term-condition', ['as' => 'term-condition', 'uses' => 'HomeController@termCondition']);

Route::get('privacy-policy', ['as' => 'privacy-policy', 'uses' => 'HomeController@privacyPolicy']);

Route::get('user-agreement', ['as' => 'user-agreement', 'uses' => 'HomeController@userAgreement']);

Route::get('student-account', ['as' => 'student-account', 'uses' => 'HomeController@studentAccount']);

Route::post('student-register/store', ['as' => 'student-register.store', 'uses' => 'HomeController@studentRegister']);

Route::post('student-login', ['as' => 'student-login-post', 'uses' => 'StudentController@studentAuthenticate']);

Route::get('student-logout', ['as' => 'student-logout', 'uses' => 'StudentController@studentLogout']);



Route::group(['prefix' => 'student', 'middleware' => ['auth:student']], function () {

	Route::get('student-dashboard', ['as' => 'student-dashboard', 'uses' => 'DashboardController@index']);
	Route::put('studentprofile/update/{id}', ['as' => 'studentprofile.update', 'uses' => 'DashboardController@studentProfileUpdate'])->where('id','[0-9]+');

});

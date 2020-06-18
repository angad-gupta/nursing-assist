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
        | Course Content  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('coursecontent', ['as' => 'coursecontent.index', 'uses' => 'CourseContentController@index']);
        // Course Content Create
        Route::get('coursecontent/create', ['as' => 'coursecontent.create', 'uses' => 'CourseContentController@create']);
        Route::post('coursecontent/store', ['as' => 'coursecontent.store', 'uses' => 'CourseContentController@store']);
        // Course Content Edit
        Route::get('coursecontent/edit/{id}', ['as' => 'coursecontent.edit', 'uses' => 'CourseContentController@edit'])->where('id','[0-9]+');
        Route::put('coursecontent/update/{id}', ['as' => 'coursecontent.update', 'uses' => 'CourseContentController@update'])->where('id','[0-9]+');
        // Course Content Delete
        Route::get('coursecontent/delete/{id}', ['as' => 'coursecontent.delete', 'uses' => 'CourseContentController@destroy'])->where('id','[0-9]+');



          /*
        |--------------------------------------------------------------------------
        | Course Plan  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('courseplan', ['as' => 'courseplan.index', 'uses' => 'CoursePlanController@index']);
        // Course Plan   Create
        Route::get('courseplan/create', ['as' => 'courseplan.create', 'uses' => 'CoursePlanController@create']);
        Route::post('courseplan/store', ['as' => 'courseplan.store', 'uses' => 'CoursePlanController@store']);
        // Course Plan Edit
        Route::get('courseplan/edit', ['as' => 'courseplan.edit', 'uses' => 'CoursePlanController@edit']);
        Route::put('courseplan/update/{id}', ['as' => 'courseplan.update', 'uses' => 'CoursePlanController@update'])->where('id','[0-9]+');
        // Course Plan Delete
        Route::get('courseplan/delete', ['as' => 'courseplan.delete', 'uses' => 'CoursePlanController@destroy']);


          /*
        |--------------------------------------------------------------------------
        | Course Sub Topic  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('coursesubtopic', ['as' => 'coursesubtopic.index', 'uses' => 'CourseSubTopicController@index']);
        // Course Sub  Topic Create
        Route::get('coursesubtopic/create', ['as' => 'coursesubtopic.create', 'uses' => 'CourseSubTopicController@create']);
        Route::post('coursesubtopic/store', ['as' => 'coursesubtopic.store', 'uses' => 'CourseSubTopicController@store']);
        // Course Sub Topic Edit
        Route::get('coursesubtopic/edit', ['as' => 'coursesubtopic.edit', 'uses' => 'CourseSubTopicController@edit']);
        Route::put('coursesubtopic/update/{id}', ['as' => 'coursesubtopic.update', 'uses' => 'CourseSubTopicController@update'])->where('id','[0-9]+');
        // Course Sub Topic Delete
        Route::get('coursesubtopic/delete', ['as' => 'coursesubtopic.delete', 'uses' => 'CourseSubTopicController@destroy']);

   
});     

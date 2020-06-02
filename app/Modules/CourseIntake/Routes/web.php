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
        | Assessment Setup  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('courseintake', ['as' => 'courseintake.index', 'uses' => 'CourseIntakeController@index']);
        // Assessment Setup Create
        Route::get('courseintake/create', ['as' => 'courseintake.create', 'uses' => 'CourseIntakeController@create']);
        Route::post('courseintake/store', ['as' => 'courseintake.store', 'uses' => 'CourseIntakeController@store']);
        // Assessment Setup Edit
        Route::get('courseintake/edit/{id}', ['as' => 'courseintake.edit', 'uses' => 'CourseIntakeController@edit'])->where('id','[0-9]+');
        Route::put('courseintake/update/{id}', ['as' => 'courseintake.update', 'uses' => 'CourseIntakeController@update'])->where('id','[0-9]+');
        // Assessment Setup Delete
        Route::get('courseintake/delete/{id}', ['as' => 'courseintake.delete', 'uses' => 'CourseIntakeController@destroy'])->where('id','[0-9]+');
      
        Route::get('courseintake/appendSetup', ['as' => 'courseintake.appendSetup', 'uses' => 'CourseIntakeController@appendSetup']);
});     

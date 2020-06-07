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
        Route::get('courseinfo', ['as' => 'courseinfo.index', 'uses' => 'CourseInfoController@index']);
        // Assessment Setup Create
        Route::get('courseinfo/create', ['as' => 'courseinfo.create', 'uses' => 'CourseInfoController@create']);
        Route::post('courseinfo/store', ['as' => 'courseinfo.store', 'uses' => 'CourseInfoController@store']);
        // Assessment Setup Edit
        Route::get('courseinfo/edit/{id}', ['as' => 'courseinfo.edit', 'uses' => 'CourseInfoController@edit'])->where('id','[0-9]+');
        Route::put('courseinfo/update/{id}', ['as' => 'courseinfo.update', 'uses' => 'CourseInfoController@update'])->where('id','[0-9]+');
        // Assessment Setup Delete
        Route::get('courseinfo/delete/{id}', ['as' => 'courseinfo.delete', 'uses' => 'CourseInfoController@destroy'])->where('id','[0-9]+');
      
        Route::get('courseinfo/appendProgramme', ['as' => 'courseinfo.appendProgramme', 'uses' => 'CourseInfoController@appendProgramme']);
        
        Route::get('courseinfo/appendStructure', ['as' => 'courseinfo.appendStructure', 'uses' => 'CourseInfoController@appendStructure']);
});     

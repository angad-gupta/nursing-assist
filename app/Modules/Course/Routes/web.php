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
    
       
        Route::get('course', ['as' => 'course.index', 'uses' => 'CourseController@index']);
    
        Route::get('course/create', ['as' => 'course.create', 'uses' => 'CourseController@create']);
        Route::post('course/store', ['as' => 'course.store', 'uses' => 'CourseController@store']);
    
        Route::get('course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit'])->where('id','[0-9]+');
        Route::put('course/update/{id}', ['as' => 'course.update', 'uses' => 'CourseController@update'])->where('id','[0-9]+');
    
        Route::get('course/delete/{id}', ['as' => 'course.delete', 'uses' => 'CourseController@destroy'])->where('id','[0-9]+');
        
         
});
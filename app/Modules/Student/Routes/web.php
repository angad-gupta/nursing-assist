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
    
       
    Route::get('student', ['as' => 'student.index', 'uses' => 'StudentController@index']);

    Route::get('student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentController@edit'])->where('id','[0-9]+');
    Route::put('student/update/{id}', ['as' => 'student.update', 'uses' => 'StudentController@update'])->where('id','[0-9]+');

    Route::get('student/delete/{id}', ['as' => 'student.delete', 'uses' => 'StudentController@destroy'])->where('id','[0-9]+');

    Route::post('student/status', ['as' => 'student.status', 'uses' => 'StudentController@status']);
        
         
});
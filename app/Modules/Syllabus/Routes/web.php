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
    
       
    Route::get('syllabus', ['as' => 'syllabus.index', 'uses' => 'SyllabusController@index']);

    Route::get('syllabus/create', ['as' => 'syllabus.create', 'uses' => 'SyllabusController@create']);
    Route::post('syllabus/store', ['as' => 'syllabus.store', 'uses' => 'SyllabusController@store']);

    Route::get('syllabus/edit/{id}', ['as' => 'syllabus.edit', 'uses' => 'SyllabusController@edit'])->where('id','[0-9]+');
    Route::put('syllabus/update/{id}', ['as' => 'syllabus.update', 'uses' => 'SyllabusController@update'])->where('id','[0-9]+');

    Route::get('syllabus/delete/{id}', ['as' => 'syllabus.delete', 'uses' => 'SyllabusController@destroy'])->where('id','[0-9]+');
        
         
});
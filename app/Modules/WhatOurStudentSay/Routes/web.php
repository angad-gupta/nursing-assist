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
    
       
    Route::get('whatourstudentsay', ['as' => 'whatourstudentsay.index', 'uses' => 'WhatOurStudentSayController@index']);

    Route::get('whatourstudentsay/create', ['as' => 'whatourstudentsay.create', 'uses' => 'WhatOurStudentSayController@create']);
    Route::post('whatourstudentsay/store', ['as' => 'whatourstudentsay.store', 'uses' => 'WhatOurStudentSayController@store']);

    Route::get('whatourstudentsay/edit/{id}', ['as' => 'whatourstudentsay.edit', 'uses' => 'WhatOurStudentSayController@edit'])->where('id','[0-9]+');
    Route::put('whatourstudentsay/update/{id}', ['as' => 'whatourstudentsay.update', 'uses' => 'WhatOurStudentSayController@update'])->where('id','[0-9]+');

    Route::get('whatourstudentsay/delete/{id}', ['as' => 'whatourstudentsay.delete', 'uses' => 'WhatOurStudentSayController@destroy'])->where('id','[0-9]+');
        
         
});
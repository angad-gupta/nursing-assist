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
    
       
    Route::get('faq', ['as' => 'faq.index', 'uses' => 'FAQController@index']);

    Route::get('faq/create', ['as' => 'faq.create', 'uses' => 'FAQController@create']);
    Route::post('faq/store', ['as' => 'faq.store', 'uses' => 'FAQController@store']);

    Route::get('faq/edit/{id}', ['as' => 'faq.edit', 'uses' => 'FAQController@edit'])->where('id','[0-9]+');
    Route::put('faq/update/{id}', ['as' => 'faq.update', 'uses' => 'FAQController@update'])->where('id','[0-9]+');

    Route::get('faq/delete/{id}', ['as' => 'faq.delete', 'uses' => 'FAQController@destroy'])->where('id','[0-9]+');
        
         
});
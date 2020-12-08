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
    
       
    Route::get('newsletter', ['as' => 'newsletter.index', 'uses' => 'NewsletterController@index']);

    Route::get('newsletter/create', ['as' => 'newsletter.create', 'uses' => 'NewsletterController@create']);
    Route::post('newsletter/store', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);

    Route::get('newsletter/delete/{id}', ['as' => 'newsletter.delete', 'uses' => 'NewsletterController@destroy'])->where('id','[0-9]+');
        
         
});
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
    
       
    Route::get('message', ['as' => 'message.index', 'uses' => 'MessageController@index']);

    Route::get('message/delete/{id}', ['as' => 'message.delete', 'uses' => 'MessageController@destroy'])->where('id','[0-9]+');
    Route::post('message/reply', ['as' => 'message.reply', 'uses' => 'MessageController@reply']);
        
    Route::get('ajax-view-message-detail', ['as' => 'ajax-view-message-detail', 'uses' => 'MessageController@ajaxViewMessageDetail']);

    Route::get('ajax-inbox-message-detail', ['as' => 'ajax-inbox-message-detail', 'uses' => 'MessageController@ajaxInboxMessageDetail']);
         
});
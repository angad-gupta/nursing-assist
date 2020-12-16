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
    
       
    Route::get('forum', ['as' => 'forum.index', 'uses' => 'ForumController@index']);

    Route::get('forum/comment/{id}', ['as' => 'forum.comment', 'uses' => 'ForumController@ForumComment'])->where('id','[0-9]+');

    Route::get('forum/delete/{id}', ['as' => 'forum.delete', 'uses' => 'ForumController@destroy'])->where('id','[0-9]+');
    
    Route::get('forum/deleteComment/{id}', ['as' => 'forum.deleteComment', 'uses' => 'ForumController@deleteComment'])->where('id','[0-9]+');
        
         
});
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
    
       
    Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@index']);

    Route::get('blog/create', ['as' => 'blog.create', 'uses' => 'BlogController@create']);
    Route::post('blog/store', ['as' => 'blog.store', 'uses' => 'BlogController@store']);

    Route::get('blog/edit/{id}', ['as' => 'blog.edit', 'uses' => 'BlogController@edit'])->where('id','[0-9]+');
    Route::put('blog/update/{id}', ['as' => 'blog.update', 'uses' => 'BlogController@update'])->where('id','[0-9]+');

    Route::get('blog/delete/{id}', ['as' => 'blog.delete', 'uses' => 'BlogController@destroy'])->where('id','[0-9]+');
        
         
});
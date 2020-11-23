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
        | Gallery CRUD ROUTE
        |--------------------------------------------------------------------------
        */
    
        Route::get('gallery', ['as' => 'gallery.index', 'uses' => 'GalleryController@index']);
    
        Route::get('gallery/create', ['as' => 'gallery.create', 'uses' => 'GalleryController@create']);
        Route::post('gallery/store', ['as' => 'gallery.store', 'uses' => 'GalleryController@store']);
  
        Route::get('gallery/edit/{id}',['as' => 'gallery.edit', 'uses' => 'GalleryController@edit']);
        Route::patch('gallery/update/{id}',['as' => 'gallery.update', 'uses' => 'GalleryController@update']);

        Route::get('gallery/deleteAlbumImage', ['as' => 'gallery.deleteAlbumImage', 'uses' => 'GalleryController@deleteAlbumImage']);


});


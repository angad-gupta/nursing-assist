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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission']], function () {

    Route::get('employment', ['as' => 'employment', 'uses' => 'EmploymentController@index']);

    
    /*
    |--------------------------------------------------------------------------
    | Employee CRUD ROUTE
    |--------------------------------------------------------------------------
    */

    Route::post('employment/uploadEmployee', ['as' => 'employment.uploadEmployee', 'uses' => 'EmploymentController@uploadGolyanEmployee']);

    Route::get('employment/downloadSheet', ['as' => 'employment.downloadSheet', 'uses' => 'EmploymentController@downloadSheet']);

    Route::get('employment', ['as' => 'employment.index', 'uses' => 'EmploymentController@index']);

    Route::get('employment/archive', ['as' => 'employment.indexArchive', 'uses' => 'EmploymentController@indexArchive']);

    Route::get('employment/create', ['as' => 'employment.create', 'uses' => 'EmploymentController@create']);
    Route::post('employment/store', ['as' => 'employment.store', 'uses' => 'EmploymentController@store']);

    Route::get('employment/edit/{id}', ['as' => 'employment.edit', 'uses' => 'EmploymentController@edit'])->where('id', '[0-9]+');
    Route::put('employment/update/{id}', ['as' => 'employment.update', 'uses' => 'EmploymentController@update'])->where('id', '[0-9]+');

    Route::get('employment/delete/{id}', ['as' => 'employment.delete', 'uses' => 'EmploymentController@destroy'])->where('id', '[0-9]+');

    Route::get('employment/view/{id}', ['as' => 'employment.view', 'uses' => 'EmploymentController@view'])->where('id', '[0-9]+');

    Route::post('employment/createUser', ['as' => 'employment.createUser', 'uses' => 'EmploymentController@createUser']);

    Route::post('employment/updateType', ['as' => 'employment.updateType', 'uses' => 'EmploymentController@updateType']);

    Route::get('employment/checkAvailability', ['as' => 'employment.checkAvailability', 'uses' => 'EmploymentController@checkAvailability']);

   

    Route::post('employment/update-status', ['as' => 'employment.update.status.user', 'uses' => 'EmploymentController@updateStatus']);
    Route::get('employment/update-status-archive/{id}', ['as' => 'employment.update.status.archive.user', 'uses' => 'EmploymentController@updateStatusArchive']);
    Route::get('employment/archive/{id}', ['as' => 'employment.update.status.archive.message', 'uses' => 'EmploymentController@archiveMessage']);

    Route::get('employment/updateParentId',array('as'=>'employment.updateParentId','uses'=>'EmploymentController@updateParentId'));

    Route::get('autocomplete', 'EmploymentController@autocomplete')->name('employment.autocomplete');

    //check email unique
    Route::get('checkEmailAvailability', 'EmploymentController@checkEmailAvailability')->name('employment.checkAvailability');


});

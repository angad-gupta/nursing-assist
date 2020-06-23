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
        | Course Material  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('coursematerial', ['as' => 'coursematerial.index', 'uses' => 'CourseMaterialController@index']);
        // Course Material Create
        Route::get('coursematerial/create', ['as' => 'coursematerial.create', 'uses' => 'CourseMaterialController@create']);
        Route::post('coursematerial/store', ['as' => 'coursematerial.store', 'uses' => 'CourseMaterialController@store']);
        // Course Material Edit
        Route::get('coursematerial/edit/{id}', ['as' => 'coursematerial.edit', 'uses' => 'CourseMaterialController@edit'])->where('id','[0-9]+');
        Route::put('coursematerial/update/{id}', ['as' => 'coursematerial.update', 'uses' => 'CourseMaterialController@update'])->where('id','[0-9]+');
        // Course Material Delete
        Route::get('coursematerial/delete/{id}', ['as' => 'coursematerial.delete', 'uses' => 'CourseMaterialController@destroy'])->where('id','[0-9]+');



          /*
        |--------------------------------------------------------------------------
        | Course Material Detail  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('coursematerialdetail', ['as' => 'coursematerialdetail.index', 'uses' => 'CourseMaterialDetailController@index']);
        // Course Material  Detail Create
        Route::get('coursematerialdetail/create', ['as' => 'coursematerialdetail.create', 'uses' => 'CourseMaterialDetailController@create']);
        Route::post('coursematerialdetail/store', ['as' => 'coursematerialdetail.store', 'uses' => 'CourseMaterialDetailController@store']);
        // Course Material Detail Edit
        Route::get('coursematerialdetail/edit', ['as' => 'coursematerialdetail.edit', 'uses' => 'CourseMaterialDetailController@edit']);
        Route::put('coursematerialdetail/update/{id}', ['as' => 'coursematerialdetail.update', 'uses' => 'CourseMaterialDetailController@update'])->where('id','[0-9]+');
        // Course Material Detail Delete
        Route::get('coursematerialdetail/delete', ['as' => 'coursematerialdetail.delete', 'uses' => 'CourseMaterialDetailController@destroy']);

        Route::get('coursematerialdetail/appendSession', ['as' => 'coursematerialdetail.appendSession', 'uses' => 'CourseMaterialDetailController@appendSession']);


          /*
        |--------------------------------------------------------------------------
        | Course Material Plan  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('materialplan', ['as' => 'materialplan.index', 'uses' => 'CourseMaterialPlanController@index']);
        // Course Material  Plan Create
        Route::get('materialplan/create', ['as' => 'materialplan.create', 'uses' => 'CourseMaterialPlanController@create']);
        Route::post('materialplan/store', ['as' => 'materialplan.store', 'uses' => 'CourseMaterialPlanController@store']);
        // Course Material Plan Edit
        Route::get('materialplan/edit', ['as' => 'materialplan.edit', 'uses' => 'CourseMaterialPlanController@edit']);
        Route::put('materialplan/update/{id}', ['as' => 'materialplan.update', 'uses' => 'CourseMaterialPlanController@update'])->where('id','[0-9]+');
        // Course Material Plan Delete
        Route::get('materialplan/delete', ['as' => 'materialplan.delete', 'uses' => 'CourseMaterialPlanController@destroy']);

        Route::get('materialplan/appendDaily', ['as' => 'materialplan.appendDaily', 'uses' => 'CourseMaterialPlanController@appendDaily']);

     

});     

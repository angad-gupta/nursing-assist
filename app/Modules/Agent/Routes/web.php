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
    
       
    Route::get('agent', ['as' => 'agent.index', 'uses' => 'AgentController@index']);

    Route::get('agent/create', ['as' => 'agent.create', 'uses' => 'AgentController@create']);
    Route::post('agent/store', ['as' => 'agent.store', 'uses' => 'AgentController@store']);

    Route::get('agent/edit/{id}', ['as' => 'agent.edit', 'uses' => 'AgentController@edit'])->where('id','[0-9]+');
    Route::put('agent/update/{id}', ['as' => 'agent.update', 'uses' => 'AgentController@update'])->where('id','[0-9]+');

    Route::get('agent/delete/{id}', ['as' => 'agent.delete', 'uses' => 'AgentController@destroy'])->where('id','[0-9]+');
        
         
});
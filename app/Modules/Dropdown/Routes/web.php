<?php


Route::group(['prefix' => 'admin', 'middleware' => ['auth','web']], function () {
          
    /*
    |--------------------------------------------------------------------------
    | DropDown  CRUD ROUTE
    |--------------------------------------------------------------------------
    */
    Route::get('dropdown', ['as' => 'dropdown.index', 'uses' => 'DropdownController@index']);
    //DropDown Create
    Route::get('dropdown/create', ['as' => 'dropdown.create', 'uses' => 'DropdownController@create']);
    Route::get('dropdown/createField', ['as' => 'dropdown.createField', 'uses' => 'DropdownController@createField']);
    Route::post('dropdown/store', ['as' => 'dropdown.store', 'uses' => 'DropdownController@store']);
    Route::post('dropdown/storeField', ['as' => 'dropdown.storeField', 'uses' => 'DropdownController@storeField']);
    //DropDown Edit
    Route::get('dropdown/edit/{id}', ['as' => 'dropdown.edit', 'uses' => 'DropdownController@edit'])->where('id','[0-9]+');
    Route::put('dropdown/update/{id}', ['as' => 'dropdown.update', 'uses' => 'DropdownController@update'])->where('id','[0-9]+');
    //DropDown Delete
    Route::get('dropdown/delete/{id}', ['as' => 'dropdown.delete', 'uses' => 'DropdownController@destroy'])->where('id','[0-9]+');
});
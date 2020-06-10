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
        | Quiz  CRUD ROUTE
        |--------------------------------------------------------------------------
        */
        Route::get('quiz', ['as' => 'quiz.index', 'uses' => 'QuizController@index']);
        // Quiz  Create
        Route::get('quiz/create', ['as' => 'quiz.create', 'uses' => 'QuizController@create']);
        Route::post('quiz/store', ['as' => 'quiz.store', 'uses' => 'QuizController@store']);
        // Quiz  Edit
        Route::get('quiz/edit/{id}', ['as' => 'quiz.edit', 'uses' => 'QuizController@edit'])->where('id','[0-9]+');
        Route::put('quiz/update/{id}', ['as' => 'quiz.update', 'uses' => 'QuizController@update'])->where('id','[0-9]+');
        // Quiz  Delete
        Route::get('quiz/delete/{id}', ['as' => 'quiz.delete', 'uses' => 'QuizController@destroy'])->where('id','[0-9]+');

});     

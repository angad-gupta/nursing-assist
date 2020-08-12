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
    
       
    Route::get('student', ['as' => 'student.index', 'uses' => 'StudentController@index']);
    Route::get('student/archive', ['as' => 'student.indexArchive', 'uses' => 'StudentController@indexArchive']);

    Route::get('student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentController@edit'])->where('id','[0-9]+');
    Route::put('student/update/{id}', ['as' => 'student.update', 'uses' => 'StudentController@update'])->where('id','[0-9]+');

    Route::get('student/delete/{id}', ['as' => 'student.delete', 'uses' => 'StudentController@destroy'])->where('id','[0-9]+');

    Route::post('student/status', ['as' => 'student.status', 'uses' => 'StudentController@status']);
        
    
       

   Route::get('studentcourse', ['as' => 'studentcourse.index', 'uses' => 'StudentController@studentCourse']);
   Route::get('studentpurchase', ['as' => 'studentpurchase.index', 'uses' => 'StudentController@studentPurchase']);
   Route::get('studentpurchase/delete', ['as' => 'studentpurchase.delete', 'uses' => 'StudentController@destroyStudentPurchase'])->where('id','[0-9]+');
   Route::get('studentquiz/result', ['as' => 'studentquiz.result', 'uses' => 'StudentController@studentquizResult']);
   Route::get('studentmockup/result', ['as' => 'studentmockup.result', 'uses' => 'StudentController@studentmockupResult']);

   Route::post('student/purchaseupdate', ['as' => 'student.purchaseupdate', 'uses' => 'StudentController@purchaseUpdate']);

   Route::post('student/courseinstallment', ['as' => 'student.courseinstallment', 'uses' => 'StudentController@courseInstallment']);
   
});
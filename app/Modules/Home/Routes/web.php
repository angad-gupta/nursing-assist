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

Route::get('home', ['as' => 'login', 'uses' => 'LoginController@login']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('about-us', ['as' => 'about-us', 'uses' => 'HomeController@AboutUs']);

Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'HomeController@ContactUs']);

Route::get('faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);

Route::get('agent', ['as' => 'agent', 'uses' => 'HomeController@agent']);

Route::post('contactus/store', ['as' => 'contactus.store', 'uses' => 'HomeController@storeContact']);

Route::get('course', ['as' => 'course', 'uses' => 'HomeController@Course']);

Route::get('course-detail', ['as' => 'course-detail', 'uses' => 'HomeController@courseDetail']);

Route::get('course-info-detail', ['as' => 'course-info-detail', 'uses' => 'HomeController@courseInfoDetail']);

Route::get('term-condition', ['as' => 'term-condition', 'uses' => 'HomeController@termCondition']);

Route::get('privacy-policy', ['as' => 'privacy-policy', 'uses' => 'HomeController@privacyPolicy']);

Route::get('user-agreement', ['as' => 'user-agreement', 'uses' => 'HomeController@userAgreement']);

Route::get('payment-plan', ['as' => 'payment-plan', 'uses' => 'HomeController@paymentPlan']);

Route::get('student-account', ['as' => 'student-account', 'uses' => 'HomeController@studentAccount']);

Route::get('student/register', ['as' => 'student.register', 'uses' => 'HomeController@studentRegisterForm']);

Route::post('student-register/store', ['as' => 'student-register.store', 'uses' => 'HomeController@studentRegister']);

Route::post('student-login', ['as' => 'student-login-post', 'uses' => 'StudentController@studentAuthenticate']);

Route::get('student-logout', ['as' => 'student-logout', 'uses' => 'StudentController@studentLogout']);

Route::post('student-update-password', ['as' => 'student-update-password', 'uses' => 'StudentController@updateStudentPassword']);

Route::get('student-hub', ['as' => 'student-hub', 'uses' => 'StudentController@studentHub']);

Route::get('resources', ['as' => 'resources', 'uses' => 'HomeController@resources']);

Route::get('enrolment', ['as' => 'enrolment', 'uses' => 'StudentController@Enrolment']);
Route::get('enrolment/checkIntakeAvailability', ['as' => 'enrolment.checkIntakeAvailability', 'uses' => 'StudentController@checkIntakeAvailability']);

Route::post('enrolment/store', ['as' => 'enrolment.store', 'uses' => 'HomeController@storeEnrolment']);

Route::get('demo-quiz', ['as' => 'demo-quiz', 'uses' => 'HomeController@demoQuiz']);

// Password reset link request routes...
Route::get('student/password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);

Route::post('student/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');

// Password reset routes...
Route::get('student/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('student.password.reset.token');
Route::post('student/password/reset', 'Auth\ResetPasswordController@reset')->name('student.password.reset');

/** --------------------------------------------------------------------------------------- **/

/** --------------------------------------------------------------------------------------- **/

Route::group(['prefix' => 'student', 'middleware' => ['auth:student']], function () {

    Route::get('student-dashboard', ['as' => 'student-dashboard', 'uses' => 'DashboardController@index']);

    Route::put('studentprofile/update/{id}', ['as' => 'studentprofile.update', 'uses' => 'DashboardController@studentProfileUpdate'])->where('id', '[0-9]+');

    Route::post('message/send', ['as' => 'message.send', 'uses' => 'DashboardController@sendMessage']);

    Route::get('student-courses', ['as' => 'student-courses', 'uses' => 'DashboardController@studentCourse']);

    Route::get('syllabus-detail', ['as' => 'syllabus-detail', 'uses' => 'DashboardController@syllabusDetail']);

    Route::get('lesson-detail', ['as' => 'lesson-detail', 'uses' => 'DashboardController@lessonsDetail']);

    Route::get('lesson-plan-detail', ['as' => 'lesson-plan-detail', 'uses' => 'DashboardController@lessonPlanDetail']);

    Route::get('student-quiz', ['as' => 'student-quiz', 'uses' => 'DashboardController@studentQuiz']);

    Route::get('mockup-question', ['as' => 'mockup-question', 'uses' => 'DashboardController@mockupQuestion']);

    Route::post('studentmockup/store', ['as' => 'studentmockup.store', 'uses' => 'DashboardController@studentmockupStore']);

    Route::post('studentquiz/store', ['as' => 'studentquiz.store', 'uses' => 'DashboardController@studentQuizStore']);

    Route::get('course-invoice', ['as' => 'course-invoice', 'uses' => 'DashboardController@studentCourseInvoice']);

    Route::get('student-resources', ['as' => 'student-resources', 'uses' => 'DashboardController@studentResources']);
    
    Route::get('student-resources-view', ['as' => 'student-resources-view', 'uses' => 'DashboardController@studentResourcesView']);
    
    Route::get('readline-question', ['as' => 'readline-question', 'uses' => 'DashboardController@readlineQuestion']);
    Route::get('readline-question/startTime', ['as' => 'readline-question.saveStartTime', 'uses' => 'DashboardController@saveStartTime']);
    Route::get('readline-question/breakTime', ['as' => 'readline-question.saveBreakTime', 'uses' => 'DashboardController@saveBreakTime']);
    Route::post('readline-question/ajaxStore', ['as' => 'readline-question.ajaxStore', 'uses' => 'DashboardController@ajaxReadinessStore']);
    Route::post('readline-question/store', ['as' => 'readline-question.store', 'uses' => 'DashboardController@studentReadinessStore']);

    Route::get('practice-question', ['as' => 'practice-question', 'uses' => 'DashboardController@practiceQuestion']);
    Route::post('practice-question/store', ['as' => 'practice-question.store', 'uses' => 'DashboardController@studentPracticeStore']);
    Route::post('practice-question/ajaxStore', ['as' => 'practice-question.ajaxStore', 'uses' => 'DashboardController@ajaxPracticeStore']); 


    Route::post('studentmockup/ajaxStore', ['as' => 'studentmockup.ajaxStore', 'uses' => 'DashboardController@ajaxQuestionStore']);

    Route::get('mockup/history/{id}', ['as' => 'mockup.history', 'uses' => 'DashboardController@studentMockupHistory']);
    Route::get('practice/history/{id}', ['as' => 'practice.history', 'uses' => 'DashboardController@studentPracticeHistory']);

    Route::get('ajax-announcement-detail', ['as' => 'ajax-announcement-detail', 'uses' => 'DashboardController@ajaxAnnouncementDetail']);
});

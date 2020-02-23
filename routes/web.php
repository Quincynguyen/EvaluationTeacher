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
Auth::routes();
Route::namespace('Student')->prefix('student')->group(function () {
	Route::get('/login', 'StudentLoginController@showLoginForm')->name('student-login');
    Route::post('/login', 'StudentLoginController@login')->name('student-login');
    Route::get('/logout','StudentLoginController@getLogout')->name('logout');
 	Route::group(['prefix'=>'home'], function ()  {
	Route::get('/home', 'HomeController@getIndex')->name('home');
	Route::get('/question', 'HomeController@getListQuestion')->name('question');
	Route::get('/changepass', 'HomeController@getChangePass')->name('change-pass');
    Route::post('/changepass', 'HomeController@changePass')->name('change-pass');
	Route::post('/home', 'HomeController@postSubject')->name('post-subject');
	Route::get('/evaluation', 'EvaluationController@getFormEvaluation')->name('form-evaluation');
	Route::post('/evaluation', 'EvaluationController@postFormEvaluation')->name('form-evaluation');
	// Route::get('', 'EvaluationController@getFormEvaluation')->name('post-subject1');
  }); 
 	
});
include('admin.php');

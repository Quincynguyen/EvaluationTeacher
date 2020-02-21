<?php

Route::namespace('Admin')->prefix('admin')->group(function () {
	// Route::get('/login', 'AdminLoginController@showLoginForm')->name('student-login');
 //    Route::post('/login', 'StudentLoginController@login')->name('student-login');
 	Route::group(['middleware' => 'admin'], function () {
	Route::get('/dashboard', 'AdminController@getStudent')->name('admin-dashboard');
	Route::post('/dashboard', 'AdminController@postStudent')->name('admin-dashboard');
	Route::get('/subject', 'ListSubjectController@getAllSubject')->name('admin-subject');
	Route::get('/class', 'ListSubjectController@getListClass')->name('admin-class');
	Route::get('/question', 'ListQuestionController@getListQuestion')->name('admin-question');
	Route::post('/editquestion/update1', 'ListQuestionController@postEdit')->name('admin-editquestion');
	Route::get('/evaluationclass', 'StatisticalClassController@getEvaluationClass')->name('admin-evaluationclass');
	Route::get('/liststudent', 'StudentController@getListStudent')->name('admin-students');
	// Route::post('/students', 'StudentController@postAllUsers')->name('allstudents');
  }); 
 	
});
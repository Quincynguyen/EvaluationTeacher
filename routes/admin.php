<?php

Route::namespace('Admin')->prefix('admin')->group(function () {
	// Route::get('/login', 'AdminLoginController@showLoginForm')->name('student-login');
 //    Route::post('/login', 'StudentLoginController@login')->name('student-login');
 	Route::group(['middleware' => 'admin'], function () {
	Route::get('/dashboard', 'AdminController@getStudent')->name('admin-dashboard');
	Route::post('/dashboard', 'AdminController@postStudent')->name('admin-dashboard');
	//Quan ly lop hoc
	Route::get('/subject', 'ListSubjectController@getAllSubject')->name('admin-subject');
	Route::get('/class', 'ListSubjectController@getListClass')->name('admin-class');
	// Quan Ly cau hoi
	Route::get('/question', 'ListQuestionController@getListQuestion')->name('admin-question');
	Route::post('/addquestion', 'ListQuestionController@addQuestion')->name('admin-addquestion');
	Route::get('/delete/delQuestion', 'ListQuestionController@deleteQuestion')->name('admin-deletequestion');
	Route::post('/editquestion/edit1', 'ListQuestionController@postEdit')->name('admin-editquestion');
	//Thong ke danh gia
	Route::get('/evaluationclass', 'StatisticalClassController@getEvaluationClass')->name('admin-evaluationclass');
	Route::get('/liststudent', 'StudentController@getListStudent')->name('admin-students');
	Route::get('/listteacher', 'ListTeacherController@getListTeacher')->name('admin-listteacher');
	Route::get('/getlistteacher', 'ListTeacherController@postListTeacher')->name('admin-postlistteacher');
	Route::get('/getPointByTeacher', 'ListTeacherController@getPointTeacher');
	Route::get('/getAllPointByTeacher', 'ListTeacherController@getAllPointByTeacher')->name('admin-getallpointbyteacher');
		Route::get('/getAllTeacherPoint', 'ListTeacherController@getAllTeacherPoint');
		Route::get('/getALlTypePoint', 'ListTeacherController@getALlTypePoint');
  }); 
 	
});
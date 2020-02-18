<?php

Route::namespace('Admin')->prefix('admin')->group(function () {
	// Route::get('/login', 'AdminLoginController@showLoginForm')->name('student-login');
 //    Route::post('/login', 'StudentLoginController@login')->name('student-login');
 	Route::group(['prefix'=>'dashboard'], function ()  {
	Route::get('/dashboard', 'DashboardController@getIndex')->name('dashboard');
	Route::post('/dashboard', 'DashboardController@postIndex')->name('dashboard');
	Route::get('/students', 'StudentController@getAllUsers')->name('allstudents');
	Route::post('/students', 'StudentController@postAllUsers')->name('allstudents');
  }); 
 	
});
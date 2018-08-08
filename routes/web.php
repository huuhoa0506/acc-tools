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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();


Route::middleware(['auth:web'])->group(function(){


	Route::name('context.')->prefix('context')->namespace('Context')->group(function(){

		Route::get('profile', 'ProfileController@get')->name('profile');

		Route::post('profile', 'ProfileController@update')->name('profile');

	});

	Route::namespace('User')->group(function(){

		Route::resource('users', 'UserController');
	});


	Route::namespace('Reminder')->group(function(){
		Route::get('reminder', 'PaymentReminderController@showForm');
		Route::post('reminder', 'PaymentReminderController@import')->name('import.reminder');
		Route::post('reminder/queue', 'PaymentReminderController@addToQueue')->name('mail.queue');
		Route::resource('reminders', 'ReminderController');
	});



});



Route::name('xhr.')->middleware(['auth'])->prefix('xhr')->namespace('XHR')->group(function(){
	Route::get('users', 'UserController@index')->name('users');
	Route::post('users', 'UserController@index')->name('users');
});


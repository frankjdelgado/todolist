<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@showWelcome');

Route::resource('tasks','TasksController');

Route::controller(
					'users',
					'UsersController',
					array(
				        'getCreate'   => 'users.create',
				        'postStore'   => 'users.store',
				    )
				);

Route::controller(
					'session',
					'SessionController',
					array(
						'getLogin'		=> 'session.create',
						'postLogin'		=> 'session.store',
						'getLogout'	    => 'session.destroy'
					)
				);

Route::controller('password','RemindersController');


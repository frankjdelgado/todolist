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

/**
 * Rutas por nombre de funcion
 * -- metodoNombre. getIndex, postStore, putEdit
 */
Route::controller(
		'users',
		'UsersController',
		array(
	        'getCreate'   => 'users.create',
	        'postStore'   => 'users.store',
	    )
	);

<?php

class UsersController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('getCreate','postStore')));
        $this->beforeFilter('csrf', array('on' => 'post'));
    }


	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		
		$this->layout->title = 'Sign up';
		$this->layout->content = View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function postStore()
	{

		// Data from form
		$data = Input::all();
		
		$user = new User;

		if (!$user->validate($data)) {

			return Redirect::route('users.create')->withErrors($user->errors())->withInput();
		}else{

			/*
			 * Generate username from email:
			 * email: example@mai.com
			 * username: example
			 */
			$user->username = current(explode("@", Input::get('email')));
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			try {
				$user->save();
				return Redirect::action('HomeController@showWelcome');
			} catch (Exception $e) {
				return Redirect::route('users.create')->with('message','Failed to create user. Please, try again.');
			}			
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function missingMethod($parameters = array())
	{
	    //
	}

}
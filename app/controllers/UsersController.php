<?php

class UsersController extends \BaseController {

	protected $layout = 'layouts.master';
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
		//

		$rules =  array(
		        	'email' => 'required|email|unique:users',
		        	'password' => 'required|min:6|confirmed',
		    	  );

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()) {
			return Redirect::route('users.create')->withErrors($validator)->withInput();
		}else{

			/*Via Mass Asignment
			$user = new User(Input::all());*/

			$user = new User;
			$user->username = current(explode("@", Input::get('email')));
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			try {
				$user->save();
				return Redirect::route('tasks.index');
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

}
<?php

class SessionController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
    {
        $this->beforeFilter('auth', array('only' => 'getLogout'));
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    // Show login view
	public function getLogin()
	{
		$this->layout->title = 'Sign in';
		$this->layout->content = View::make('session.login');
	}

	// Process login request
	public function postLogin()
	{

		$user = array(
					'email' => Input::get('email'), 
					'password' => Input::get('password')
				);

		if (Auth::attempt($user)){

			// Save current user
			$user = Auth::user();
	        Session::put('username', $user->username);
	        Session::put('user_id', $user->id);

		    return Redirect::intended('tasks')->with('message','Welcome!');
		}else{
			return Redirect::back()->with('message','Email and/or password invalid.')->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	}

	public function missingMethod($parameters = array())
	{
	    //
	}

}

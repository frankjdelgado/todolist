<?php

class SessionController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
    {
        $this->beforeFilter('auth', array('only' => 'getLogout'));
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	public function getLogin()
	{
		$this->layout->title = 'Sign in';
		$this->layout->content = View::make('session.login');
	}

	public function postLogin()
	{

		$user = array('email' => Input::get('email'), 'password' => Input::get('password'));

		if (Auth::attempt($user)){

			// Obtener usuario actual
			$user = Auth::user();

			/**
			 * Guardar datos en sesion
			 * 'nombre', $dato
			 */
	        Session::put('username', $user->username);

	        /**
	         * Variable en sesion que dure un solo request
	         * Session::flash('nombre',$mensaje)
	         * with('nombre',$mensaje)
	         */
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

}

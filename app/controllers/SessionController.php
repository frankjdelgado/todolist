<?php

class SessionController extends \BaseController {

	public function posttLogin()
	{

		$user = array('email' => Input::get('email'), 'password' => Input::get('password'));

		if (Auth::attempt($user)){
		    return Redirect::intended('tasks');
		}else{
			return Redirect::back()->with('error');
		}
	}

	public function postLogout()
	{
		# code...
	}


}

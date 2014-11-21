<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends SuperModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	// Index Blacklist
	protected $hidden = array('password', 'remember_token');

	// Store Whitelist
	protected $fillable = array('password','email');

	protected $rules =  array(
		        	'email' => 'required|email|unique:users',
		        	'password' => 'required|min:6|confirmed',
		    	  );

	public function tasks()
    {
        return $this->hasMany('Task'); 
    }

}

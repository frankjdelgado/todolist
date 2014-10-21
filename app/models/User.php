<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * Asignacion masiva:
	 * -- whitelist de atributos para asignacion masiva. Crear o Actualizar
	 */	
	protected $fillable = array('password','email');

	/**
	 * Relaciones:
	 * -- en plural si de vuelve muchos objetos
	 * -- en singular si devuelve un solo objeto
	 */	
	public function tasks()
    {
    	/* User::find(1).taks */
        return $this->belongsTo('Task'); 
    }

}

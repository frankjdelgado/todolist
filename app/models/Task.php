<?php

class Task extends Eloquent {

	protected $fillable = [];

	/**
	 * Tabla:
	 * nombre_de_tabla
	 * --minuscula y plural
	 * --si no sigue esta convencion, especificar con protected $table = 'nombre_de_tabla';
	 */

	protected $table = 'tasks';


	/**
	 * Relaciones:
	 * function nombreRelacion
	 * belongsTo('NombreModelo');
	 */	
	public function user()
    {
    	/* Task::find(1).user */
        return $this->belongsTo('User');
    }

	/**
	 * Scopes:
	 * function scopeNombre($query)
	 */

	/**
	 * Obtener todas las tareas completadas:
	 *
	 * @var query
	 * @return tasks 
	 */
	public function scopeCompleted($query)
    {
        return $query->where('completed','=',1)->orderBy('created_at','DESC');
    }

    /**
	 * Obtener todas las tareas pendientes:
	 *
	 * @var query
	 * @return tasks 
	 */
    public function scopePending($query)
    {
        return $query->where('completed','=',0)->orderBy('created_at','DESC');
    }

}
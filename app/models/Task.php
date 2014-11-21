<?php

class Task extends SuperModel {

	protected $fillable = [];

	protected $table = 'tasks';

	protected $rules = array(
        'name' => 'required|unique:tasks',
    );


	/*
	 ********************
	 * Relationships    *
	 ********************
	 */
	public function user()
    {
        return $this->belongsTo('User');
    }

	/**
	 * Get all completed tasks:
	 *
	 * @var query
	 * @return tasks 
	 */
	public function scopeCompleted($query)
    {
        return $query->where('completed','=',1)->orderBy('created_at','ASC');
    }

    /**
	 * Get all pending tasks:
	 *
	 * @var query
	 * @return tasks 
	 */
    public function scopePending($query)
    {
        return $query->where('completed','=',0)->orderBy('created_at','ASC');
    }


	/*
	 ********************
	 * Helpers          *
	 ********************
	 */
    public function simpleDate()
	{
		return \Carbon\Carbon::parse($this->created_at)->format('d/m/Y');
	}

}
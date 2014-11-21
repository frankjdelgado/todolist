<?php

class TasksController extends \BaseController {

	protected $layout = 'layouts.master';

	// Filters
	public function __construct()
    {
    	// All routes protected from Guest Users
        $this->beforeFilter('auth',array());
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		// Get current user tasks
		$user_id = Helpers::currentUserID();
		$tasks = Task::where('user_id','=',$user_id)->orderBy('completed','ASC')->orderBy('created_at','ASC')->get();
		
		$this->layout->title = 'Tasks';
		$this->layout->content = View::make('tasks.index')->with('tasks',$tasks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Redirect::route('tasks.index');
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// Collect data from form
		$data = Input::all();

		$task = new Task();

		// Validate if data is acceptable!
		if (!$task ->validate($data)) {

			return Redirect::route('tasks.index')->withErrors($task->errors())->withInput();

		}else{

			$task->name = Input::get('name');
			$task->user_id = Helpers::currentUserID();

			try {
				$task->save();
				return Redirect::route('tasks.index');
			} catch (Exception $e) {
				return Redirect::route('tasks.index')->with('message',$e->getMessage());
			}			
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Redirect::route('tasks.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Redirect::route('tasks.index');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$user_id = Helpers::currentUserID();

		$task = Task::where('user_id','=',$user_id)->where('id','=',$id)->first();

		// Tag as complete/uncomplete if the task exist and belongs to the current user.
		try {
			if($task->completed){
				$task->completed = 0;
			}else{
				$task->completed = 1;
			}
			$task->save();
			return Redirect::route('tasks.index');
		} catch (Exception $e) {
			return Redirect::route('tasks.index')->with('message','Failed to update task. Please, try again.');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$user_id = Helpers::currentUserID();
		
		$task = Task::where('user_id','=',$user_id)->where('id','=',$id)->first();

		try {
			$task->delete();
			return Redirect::route('tasks.index');
		} catch (Exception $e) {
			return Redirect::route('tasks.index')->with('message','Failed to update task. Please, try again.');
		}

		return Redirect::route('tasks.index');
	}


}

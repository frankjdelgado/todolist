<?php

class TasksController extends \BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $user = User::find(Helpers::currentUserID());
		// $user = Auth::user();
		// $tasks = Task::where('user_id','=','7')->orderBy('completed','ASC')->orderBy('created_at','ASC')->get();
		$tasks = Auth::user()->tasks()->orderBy('completed','ASC')->orderBy('created_at','ASC')->get();

		// Log de consultas a la BD
		// return $queries = DB::getQueryLog();
		
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =  array('name' => 'required|unique:tasks');

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()) {
			return Redirect::route('tasks.index')->withErrors($validator)->withInput();
		}else{

			$task = new Task;
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
		//
		return 'show';
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
		//
		// return 'edit';
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
		// return 'update';
		$task = Task::find($id);

		try {
			$task->completed = true;
			$task->save();
			return Redirect::route('tasks.index');
		} catch (Exception $e) {
			return Redirect::route('tasks.index')->with('message',$e->getMessage());
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
		//
		return Redirect::route('tasks.index');
	}


}

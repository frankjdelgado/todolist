@extends('layouts.master')
@section('css')
<link href="{{asset('css/tasks.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-offset-2 col-md-6">
		<ul class="list-unstyled task-list">
			@foreach ($tasks as $task)
				@if(!$task->completed)
				    <li>
						<p>{{$task->name}}</p>
						<span class="task-info">{{$task->simpleDate()}}</span>
						<a href="{{route('tasks.update',$task->id)}}" class="btn-done" data-method="put" rel="nofollow">
							<span class="icon-clock"></span>
							<span class="icon-checkmark"></span>
						</a>
					</li>
				@else
					<li class="task-done">
						<p>{{$task->name}}</p>
						<span class="task-info">DONE</span>
						<span class="icon-checkmark"></span>
					</li>
				@endif
			@endforeach
		</ul>
    </div>
    <div class="col-xs-12 col-md-offset-1 col-md-3">
    	{{ Form::open(array('route' => 'tasks.store', 'role'=>'form', 'class' => 'form-todo')) }}
        <div class="form-group">
          {{ Form::label('name', 'new task', array('class' => 'text-uppercase')) }}        
          {{ Form::text('name', $value = null, $attributes = array('autofocus','autocomplete'=>'off')) }}
          @if($errors->has('name'))
            <span class="text-red">{{$errors->first('name')}}</span>
          @endif
        </div>
        <div class="text-right">
          {{ Form::submit('Submit',$attributes = array('class'=>'btn btn-todo-red')) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop

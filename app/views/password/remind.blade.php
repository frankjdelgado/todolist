@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-offset-4 col-md-4">
      {{ Form::open(array('action' => 'RemindersController@postRemind', 'role'=>'form', 'class' => 'form-todo')) }}
        <div class="form-group">
          {{ Form::label('email', 'email', array('class' => 'text-uppercase')) }}        
          {{ Form::email('email', null,  array('autofocus')) }}
        </div>
        <div class="text-right">
          {{ Form::submit('Remind', array('class'=>'btn btn-todo-red')) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop

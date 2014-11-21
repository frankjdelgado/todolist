@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-offset-4 col-md-4">
      {{ Form::open(array('action' => 'RemindersController@postReset', 'role'=>'form', 'class' => 'form-todo')) }}
      <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
          {{ Form::label('email', 'email', array('class' => 'text-uppercase')) }}        
          {{ Form::email('email', null, array('autofocus')) }}
        </div>
        <div class="form-group">
          {{ Form::label('password', 'password', array('class' => 'text-uppercase')) }}
          {{ Form::password('password') }}
        </div>
        <div class="form-group">
          {{ Form::label('password_confirmation', 'password confirmation', array('class' => 'text-uppercase')) }}
          {{ Form::password('password_confirmation') }}
        </div>
        <div class="text-right">
          {{ Form::submit('Reset',array('class'=>'btn btn-todo-red')) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop

@extends('layouts.master')
@section('css')
@stop
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-offset-4 col-md-4">
      {{ Form::open(array('route' => 'session.store', 'role'=>'form', 'class' => 'form-todo')) }}
        <div class="form-group">
          {{ Form::label('email', 'email', array('class' => 'text-uppercase')) }}        
          {{ Form::email('email', $value = null, $attributes = array('autofocus')) }}
        </div>
        <div class="form-group">
          {{ Form::label('password', 'password', array('class' => 'text-uppercase')) }}
          {{ Form::password('password', $attributes = array('autofocus')) }}
        </div>
        <div class="text-left">
          <a href="{{action('RemindersController@getRemind')}}">Forgot password?</a>
        </div>
        <div class="text-right">
          {{ Form::submit('Submit',$attributes = array('class'=>'btn btn-todo-red')) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop

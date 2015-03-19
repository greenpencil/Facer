@extends('templates.default')

@section('content')
    <div class="col-md-7" style="text-align: center;"><img src="./images/globe.png"></div>
    <div class="col-md-5">
        <h2>Sign Up!</h2>
        <h4>Facer is free forever</h4>

        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
        </div>
        {{ Form::open() }}
        {{Form::text('fname', null, array('placeholder' => 'First Name', 'class'=> 'form-control'))}}
        {{Form::text('lname', null, array('placeholder' => 'Last Name', 'class'=> 'form-control'))}}
        {{Form::text('email', null, array('placeholder' => 'Email', 'class'=> 'form-control'))}}
        {{Form::text('password', null, array('placeholder' => 'Password', 'class'=> 'form-control'))}}

        {{Form::submit('Sign Up',array('class'=> 'btn btn-primary'))}}
        {{ Form::close(); }}
   </div>
@stop
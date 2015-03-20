@extends('templates.default')

@section('content')
    @if (Session::has('login_error'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Login Error! </strong> {{ Session::get('login_error') }}
        </div>
    @endif
    <div class="col-md-7" style="text-align: center;"><img src="./images/globe.png"></div>
    <div class="col-md-5">
        <h2>Sign Up!</h2>
        <h4>Facer is free forever</h4>

            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> Hello I am a placeholder
            </div>

        {{ Form::open() }}
        <div class="form-group">
            {{Form::text('fname', null, array('placeholder' => 'First Name', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::text('lname', null, array('placeholder' => 'Last Name', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::text('email', null, array('placeholder' => 'Email', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::password('passwordconfirm', array('placeholder' => 'Confirm Password', 'class'=> 'form-control'))}}
        </div>

        {{Form::submit('Sign Up',array('class'=> 'btn btn-primary'))}}
        {{ Form::close(); }}
   </div>
@stop
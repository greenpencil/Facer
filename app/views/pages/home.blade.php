@extends('templates.default')

@section('content')
    @if (Session::has('login_error'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Oh Snap!</strong> {{ Session::get('login_error') }}
        </div>
    @endif
    @if (Session::has('login_notice'))
        <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Thanks!</strong> {{ Session::get('login_notice') }}
        </div>
    @endif

    <div class="col-md-7" style="text-align: center;"><img src="./images/globe.png"></div>
    <div class="col-md-5">
        <h2>Sign Up!</h2>
        <h4>Facer is free forever</h4>

        @if ( $errors->count() > 0 )
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> Some errors have occurred, check them and try again
                <ul>
                    @foreach( $errors->all() as $message )
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open( array('url' => '/register', 'method' => 'POST')) }}
        <div class="form-group">
            {{Form::text('first_name', null, array('placeholder' => 'First Name', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::text('last_name', null, array('placeholder' => 'Last Name', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::text('email', null, array('placeholder' => 'Email', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class'=> 'form-control'))}}
        </div>

        {{Form::submit('Sign Up',array('class'=> 'btn btn-primary'))}}
        {{ Form::close(); }}
   </div>
@stop
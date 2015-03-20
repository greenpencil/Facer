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

    <div class="col-md-7">
        <h2>What is this?</h2>
        <p>This is the demo of Facer, a Facebook-like social network. It is designed as a robust framework for people
        wanting to build their own social network software. It's built in PHP using Laravel and is completely open
        source. <a href="http://github.com/greenpencil/facer">Find out more on GitHub</a>.</p>
        <h3>About the Developer</h3>
        <p>Facer was built by Katie Paxton-Fear, a Computer Science student at the University of Salford, Manchester.
            She is easily bored and needs more things to do with her time.
        You can <a href="http://twitter.com/greenpencillp">follow her on Twitter</a> or <a href="http://www.kpf.io/">visit her website</a> to find out more.</p>
    </div>

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
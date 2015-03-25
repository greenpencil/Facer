<nav class="navbar navbar-default">
    <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Facer</a>
            </div>

            @if(Auth::check())
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" style="width: 400px;">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-users"></i>
                                @if(Auth::user()->hasFriendRequest->count() > 0)
                                    <span class="badge">{{Auth::user()->hasFriendRequest->count()}}</span>
                                @endif
                            </a>
                            <ul class="requests dropdown-menu" role="menu">
                                @if(Auth::user()->hasFriendRequest->count() > 0)
                                    @foreach (Auth::user()->hasFriendRequest as $request)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="/images/profile/{{ $request->id }}.png" height="40px"
                                                     class="img-rounded avatar">
                                            </div>
                                            <div class="col-md-4">
                                                <li>
                                                    <a href="/profile/{{$request->username}}">{{ $request->first_name}} {{ $request->last_name }}</a>
                                                </li>
                                                <li>{{ $request->created_at->diffForHumans() }}</li>
                                            </div>
                                            <div class="col-md-3">
                                                <a class="btn btn-info"
                                                   href="/acceptfriend/{{ $request->id }}">Accept</a>
                                            </div>
                                            <div class="col-md-3">
                                                <a class="btn btn-default" href="/declinefriend/{{ $request->id }}">Decline</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        No friend requests! :(
                                    </div>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-comments"></i>
                            </a>
                            <ul class="requests dropdown-menu" role="menu">
                                <div class="row">
                                    <div class="col-md-12">
                                        ddsgdfsgdsf
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        ddsgdfsgdsf
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        ddsgdfsgdsf
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-globe"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Test1</a></li>
                                <li><a href="#">Test2</a></li>
                                <li><a href="#">Test3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Report Issue</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        </div>
        @else
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {{ Form::open(array('class' => 'navbar-form navbar-right', 'role'=> 'login', 'url' => '/login', 'method' => 'POST')) }}
                <div class="form-group">
                    {{Form::text('email', null, array('id'=>'login','placeholder' => 'Email', 'class'=> 'form-control'))}}
                    {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
                    {{Form::submit('Login',array('class'=> 'btn btn-default'))}}
                </div>
                {{Form::close()}}
            </div>
        @endif
    </div>
</nav>
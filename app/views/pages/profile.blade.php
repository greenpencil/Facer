@extends('templates.default')

@section('content')
    <div class="row profile-nav-row" style="height: 350px;
                                        border-bottom: 0px;
                                        background-image: url('../images/banner/{{$user->id}}.png');
                                        ">
        <div class="profile-details">
            <div class="col-md-2">
                <img src="../images/profile/{{$user->id}}.png" class="img-rounded avatar"
                     style="border: 4px solid #fff;">
            </div>
            <div class="col-md-10">
                {{ $user->first_name}} {{$user->last_name}}
            </div>
        </div>
    </div>
    <div class="row profile-nav-row" style="margin-bottom: 10px;">
        <div class="col-md-12">
            <ul class="profile-nav">
                <li class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Timeline</a></li>
                <li><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
                <li><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
                <li><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos</a></li>
                <li><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Groups</a></li>
                <li><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a></li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="timeline">
        <div class="col-md-6">
            <div class="create post">
                kjhdsjkhfdskjh
            </div>
            <div class="create post">
                dsffsadfasd
            </div>
            <div class="create post">
                dsffsadfasd
            </div>
            <div class="create post">
                dsffsadfasd
            </div>
            <div class="create post">
                dsffsadfasd
            </div>
        </div>

        <div class="col-md-6">
            <div class="create post">
                {{ Form::open(array('url' => '/post/new', 'method' => 'post', 'class' => 'form-horizontal')) }}
                {{Form::textarea('text', null, array('placeholder' => "What's on your mind?", 'class'=> 'form-control', 'rows'=>'2'))}}
                <div class="submit">
                    {{Form::submit('Post',array('class'=> 'btn btn-primary'))}}
                </div>
                {{ Form::close() }}
            </div>
            @foreach($posts as $post)
                <div class="post">
                    <div class="title">
                        <img src="../images/profile/{{$post->user->id}}.png" height="50px"
                             class="img-rounded avatar">
                        <a href="/profile/{{$post->user->username}}">{{ $post->user->first_name}} {{$post->user->last_name}}</a>
                        <span class="details">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text">
                        {{ $post->text }}
                    </div>
                    <div class="options">
                        <ul>
                            @if(in_array($post->id, $likes->toArray()))
                                <li><a href="/unlike/{{ $post->id}}">unlike</a> ·</li>
                            @else
                                <li><a href="/like/{{ $post->id}}">like</a> ·</li>
                            @endif
                            <li><a data-toggle="collapse" href="#post-comment-{{ $post->id}}" aria-expanded="false"
                                   aria-controls="post-comment-{{ $post->id}}">Comment</a> ·
                            </li>
                            <li> Share</li>
                        </ul>
                    </div>
                    <div class="comments">
                        @if($post->likes->count() == 1)
                            <div class="likes">
                                @foreach($post->likes as $like)
                                    <a href="/profile/{{$like->user->username}}">{{ $like->user->first_name }} {{ $like->user->last_name }}</a>
                                @endforeach
                                likes this.
                            </div>
                        @elseif($post->likes->count() == 2)
                            <div class="likes">
                                @foreach($post->likes as $like)
                                    <a href="/profile/{{$like->user->username}}">{{ $like->user->first_name }} {{ $like->user->last_name }}</a>
                                    and
                                @endforeach
                                like this.
                            </div>
                        @elseif($post->likes->count() == 3)
                            <div class="likes">
                                <a href="">{{$post->likes->count()}} people</a> like this.
                            </div>
                        @endif
                        <div class="collapse" id="post-comment-{{ $post->id}}" style="padding: 10px 30px 0 30px;">
                            {{ Form::open(array('url' => '/comment/new/'.$post->id, 'method' => 'post', 'class' => 'form-horizontal')) }}
                            <div class="row">
                                <div class="col-md-11">
                                    {{Form::textarea('text', null, array('placeholder' => "Write a Comment...", 'class'=> 'form-control', 'rows'=>'1'))}}
                                </div>
                                <div class="col-md-1">
                                    {{Form::submit('Post',array('class'=> 'btn btn-primary'))}}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                <img src="../images/profile/{{ $comment->user->id}}.png" height="30px"
                                     class="img-rounded avatar">
                                    <span class="name"><a
                                                href="/profile/{{ $comment->user->username}}">{{ $comment->user->first_name}} {{$comment->user->last_name}}</a></span>
                                <span class="text">{{$comment->text}}</span>

                                <div class="details">Like · {{$comment->created_at->diffForHumans()}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        <div role="tabpanel" class="tab-pane" id="about">...</div>
        <div role="tabpanel" class="tab-pane" id="friends">...</div>
        <div role="tabpanel" class="tab-pane" id="photos">...</div>
        <div role="tabpanel" class="tab-pane" id="groups">...</div>
        <div role="tabpanel" class="tab-pane" id="events">...</div
    </div>
@stop
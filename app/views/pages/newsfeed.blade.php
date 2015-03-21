@extends('templates.default')

@section('content')
	@if (Session::has('login_success'))
		<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Success! </strong> {{ Session::get('login_success') }}
		</div>
	@endif
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

	<div class="col-md-2">@include('templates.sidenav')</div>
	<div class="col-md-10">
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
					<img src="./images/profile/{{$post->user->id}}.png" height="50px" class="img-rounded avatar">
					{{ $post->user->first_name}} {{$post->user->last_name}}
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
						<li> Comment ·</li>
						<li> Share</li>
					</ul>
				</div>
				<div class="comments">
					@if($post->likes->count() == 1)
						<div class="likes">
							@foreach($post->likes as $like)
									{{ $like->user->first_name }} {{ $like->user->last_name }}
							@endforeach
								likes this.
						</div>
					@elseif($post->likes->count() == 2)
						<div class="likes">
							@foreach($post->likes as $like)
								{{ $like->user->first_name }} {{ $like->user->last_name }} and
							@endforeach
							like this.
						</div>
					@elseif($post->likes->count() == 4)
						<div class="likes">
							{{$post->likes->count()}} people like this.
						</div>
					@endif
					@foreach($post->comments as $comment)
						<div class="comment">
							<img src="./images/profile/{{ $comment->user->id}}.png" height="30px" class="img-rounded avatar">
							<span class="name">{{ $comment->user->first_name}} {{$comment->user->last_name}}</span>
							<span class="text">{{$comment->text}}</span>
							<div class="details">Like · {{$comment->created_at->diffForHumans()}}</div>
						</div>
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
@stop
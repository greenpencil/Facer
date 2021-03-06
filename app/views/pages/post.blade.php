@extends('templates.default')

@section('content')
	<div class="col-md-2"></div>
	<div class="col-md-10">
			<div class="post">
				<div class="title">
					<img src="../images/profile/{{$post->user->id}}.png" height="50px" class="img-rounded avatar">
					<a href="/profile/{{$post->user->username}}">{{ $post->user->first_name}} {{$post->user->last_name}}</a>
					<span class="details"><a href="/view/{{$post->id}}">{{ $post->created_at->diffForHumans() }}</a></span>
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
						<li> <a data-toggle="collapse" href="#post-comment-{{ $post->id}}" aria-expanded="false" aria-controls="post-comment-{{ $post->id}}" >Comment</a> ·</li>
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
								<a href="/profile/{{$like->user->username}}">{{ $like->user->first_name }} {{ $like->user->last_name }}</a> and
							@endforeach
							like this.
						</div>
					@elseif($post->likes->count() == 3)
						<div class="likes">
							<a data-toggle="modal" data-target="#likes-{{$post->id}}" href="">{{$post->likes->count()}} people</a> like this.
						</div>

						<div class="modal fade" id="likes-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="likes-label-{{$post->id}}" aria-hidden="true">
							<div class="modal-dialog" style="width: 350px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="likes-label-{{$post->id}}">People who like this</h4>
									</div>
									<div class="modal-body">
										@foreach($post->likes as $like)
											<div class="row" style="margin-bottom: 10px;">
												<div class="col-md-2"><img src="../images/profile/{{$like->user->id}}.png" height="50px" class="img-rounded avatar"></div>
												<div class="col-md-10">
													<a href="/profile/{{$like->user->username}}">{{ $like->user->first_name }} {{ $like->user->last_name }}</a>
												</div>
											</div>
										@endforeach</div>
								</div>
							</div>
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
							<img src="../images/profile/{{ $comment->user->id}}.png" height="30px" class="img-rounded avatar">
							<span class="name"><a href="/profile/{{ $comment->user->username}}">{{ $comment->user->first_name}} {{$comment->user->last_name}}</a></span>
							<span class="text">{{$comment->text}}</span>
							<div class="details">Like · {{$comment->created_at->diffForHumans()}}</div>
						</div>
					@endforeach
				</div>
			</div>
	</div>
@stop
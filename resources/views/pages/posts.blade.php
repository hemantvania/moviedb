@extends('layouts.home')

@section('content')
	<h1>
	@if(!empty($result['postuser']))
	{{ $result['postuser'] }}'s Posts
	@else
		User's Posts
	@endif
	</h1>

	<ul class="list-group">
	@if(count($result['posts']) > 0)
    	@foreach ($result['posts'] as $post)
    		<li class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> <a href="{{ url('/post/'.$post->id) }}">{{ $post->title }}</a> <span class="pull-right">By <a href="{{ url('/user/'.$post->user->id) }}">{{ $post->user->name }}</a></span></li>
    	@endforeach
	@else
		<li class="list-group-item">No Post Found From Users!</li>
	@endif
	</ul>
	@if(!empty($result['postuser']))
	<div class="row">
		<div class="col-xs-12 col-md-12  col-sm-12"><h4><a href="{{ url ('/posts') }}">See all Posts</a></h4></div>
	</div>
	@endif
@stop
@extends('layouts.home');
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0 text-center">
        	@if($post->title)
        	<h1>{{ $post->title }}</h1>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="panel-body">
			<div class="col-xs-12 col-md-12 col-sm-12 text-center">
				@if($post->post_image)
				<img alt="{{ $post->title }}" src="{{ url('/postimages/'.$post->post_image) }}">
				@endif
			</div>
			<div class="col-xs-12 col-md-12 col-sm-12">
				{!! nl2br($post->body) !!}
			</div>
		</div>
	</div>
	<div class="row">
          <div class="col-xs-12 col-md-8"><h4>{{ $post->author }}</h4></div>
          <div class="col-xs-6 col-md-4">Posted: <span class="small">{{ getFormettedDateTime($post->created_at) }}</span></div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-md-12  col-sm-12"><h4><a href="{{ url ('/posts') }}">Back to Posts</a></h4></div>
	</div>

</div>
@stop

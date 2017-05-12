@extends('layouts.home')

@section('content')
@if(count($result['posts']) > 0 )
<h1>Your result for '{{ $result['search'] }}'</h1>
@else
<h1>No match <strong>"{{ $result['search'] }}"</strong></h1>
@endif

@if(count($result['posts']) > 0)
<ul class="list-group">
	@foreach($result['posts'] as $post)
		<li class="list-group-item"><a href="{{ url('/post/'.$post->id )}}">{{ $post->title }}</a></li>
	@endforeach
</ul>
@endif

@stop
@extends('layouts.home')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			@if(Session::get('message') !== null )
				<div class="alert alert-success">
				{{Session::get('message')}}
				</div>
			@endif
				<div class="panel-heading">User Profile <span class="pull-right">
				@if($user->isself)
				<a href="{{ url('/profile/edit') }}">Edit</a></span>
				@endif

				</div>
				<div class="panel-body">
					@if($profile_pic)
					<div class="text-center" style="padding-bottom: 20px;"><img alt="" src="{{ $profile_pic }}" width="450px" height="300px"> </div>
					@endif
					<ul class="list-group">
						<li class="list-group-item col-md-3 col-sm-3">Name:</li>
						<li class="list-group-item col-md-9 col-sm-9">{{ $user->name }}</li>
						<li class="list-group-item col-md-3 col-sm-3">User Name:</li>
						<li class="list-group-item col-md-9 col-sm-9">{{ $user->username }}</li>
						<li class="list-group-item col-md-3 col-sm-3">Email:</li>
						<li class="list-group-item col-md-9 col-sm-9">{{ $user->email }}</li>
						<li class="list-group-item col-md-3 col-sm-3">Mobile:</li>
						<li class="list-group-item col-md-9 col-sm-9">
						@if(!empty($user->mobile_no))
							{{ $user->mobile_no  }}
						@else
							{!! NotMentionedText() !!}
						@endif
						</li>
						<li class="list-group-item col-md-3 col-sm-3">Date Of Bith:</li>
						<li class="list-group-item col-md-9 col-sm-9">
						@if(!empty($user->date_of_birth))
							{{ getFormettedDate($user->date_of_birth) }}
						@else
							{!! NotMentionedText() !!}
						@endif
						</li>
						<li class="list-group-item col-md-3 col-sm-3">Created On:</li>
						<li class="list-group-item col-md-9 col-sm-9">{{ getFormettedDateTime($user->created_at) }}</li>
						<li class="list-group-item col-md-3 col-sm-3">Last Updated:</li>
						<li class="list-group-item col-md-9 col-sm-9">{{ getFormettedDateTime($user->updated_at) }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-6 col-sm-6 text-center"><a href="{{ url ('/user/'.$user->id.'/posts') }}">See All Posts of {{ $user->name }}</a></div>
		<div class="col-xs-6 col-md-6 col-sm-6 text-center"><a href="{{ url ('/user/'.$user->id.'/gallery') }}">Photos of {{ $user->name }}</a></div>
	</div>
</div>
@stop

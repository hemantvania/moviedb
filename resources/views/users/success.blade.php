@extends('layouts.home')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@if(Session::get('message') !== null )
				<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<div class="panel-heading"><h1>Success!</h1></div>
				<div class="panel-body">
					<h3>Please check your emails and verify your account.</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@extends('layouts.home') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit User Profile</div>
				<div class="panel-body">
				@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/edit') }}">
                    {{ csrf_field() }}{{ method_field('PUT') }}
					<ul class="list-group">
						<li class="list-group-item col-md-3 col-sm-3">Name:</li>
						<li class="list-group-item col-md-9 col-sm-9"><input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus></li>
						<li class="list-group-item col-md-3 col-sm-3">Email:</li>
						<li class="list-group-item col-md-9 col-sm-9"><input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" ></li>
						<li class="list-group-item col-md-3 col-sm-3">Mobile:</li>
						<li class="list-group-item col-md-9 col-sm-9">
							<input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{ $user->mobile_no }}"  autofocus maxlength="10" ></li>
						<li class="list-group-item col-md-3 col-sm-3">Date Of Bith:</li>
						<li class="list-group-item col-md-9 col-sm-9">
							<input id="date_of_birth" type="text" class="date form-control" name="date_of_birth" value="{{ $user->date_of_birth }}" required autofocus readonly></li>
						<li class="list-group-item col-md-12 col-sm-12"><button type="submit" class="btn btn-primary pull-right">
                                    Update
                                </button></li>
					</ul>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

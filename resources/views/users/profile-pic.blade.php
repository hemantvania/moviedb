@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload/Change Profile Picture</div>
                @if(Session::get('message') !== null )
    				<div class="alert alert-success">
    				{{Session::get('message')}}
    				</div>
    			@endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile-pic') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('profile_image') ? ' profile_image' : '' }}">
                            <label for="profile_image" class="btn btn-default btn-file">Uplaod Image</label>
                            <div class="col-md-6">
                                <input style="display: none;" type="file" id="profile_image" class="form-control" name="profile_image" value="{{ old('profile_image') }}" >
                                @if ($errors->has('profile_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
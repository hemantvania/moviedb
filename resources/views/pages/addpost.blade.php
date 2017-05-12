@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Post</div>
                @if(Session::get('message') !== null )
    				<div class="alert alert-success">
    				{{Session::get('message')}}
    				</div>
    			@endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('PostsController@save') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Post Title</label>
                            <div class="col-md-6">
                            	<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Content</label>
                            <div class="col-md-6">
                                <textarea id="body" class="form-control" name="body" rows="3" cols="30">{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('post_image') ? ' post_image' : '' }}">
                            <label for="post_image" class="btn btn-default btn-file">Uplaod Image</label>
                            <div class="col-md-6">
                                <input style="display: none;" type="file" id="post_image" class="form-control" name="post_image" value="{{ old('post_image') }}" >
                                @if ($errors->has('post_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_image') }}</strong>
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
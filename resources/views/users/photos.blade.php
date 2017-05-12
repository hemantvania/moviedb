@extends('layouts.home') @section('content')
<div class="container">
<h1>
	@if(!empty($postuser))
	{{ $postuser }}'s Photos
	@else
		My Photos
	@endif
	</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
    				<div class="row portfolio">
    				@if(count($photos) > 0 )
    					@foreach($photos as $photo )
							<div class="col-sm-6 col-md-3 text-center">
                              <div class="thumbnail">
                                <img class="img-responsive" src="{{ url('profilepics').'/'.$photo->image }}" alt="The awesome description" data-toggle="modal" data-target="#myModal_{{ $photo->id }}">
                              </div>
                              @if($photo->created_at)
                				<small><em>{{  getFormettedDateTime($photo->created_at) }}</em></small>
    						@endif
                            </div>
						@endforeach
    				@else
    					<div class="col-sm-12 col-md-12 text-center">
                              <div class="thumbnail">No Image found</div>
                        </div>
    				@endif
    				</div>
    				  <!-- Modal -->
    				 @foreach($photos as $photo )
                      <div class="modal fade" id="myModal_{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <img class="img-responsive" src="{{ url('profilepics').'/'.$photo->image }}" alt="The awesome description" style="display: inline-block;">
                            </div>
                          </div>
                        </div>
                      </div>
                     @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop

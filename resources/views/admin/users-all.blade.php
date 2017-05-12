@extends('layouts.admin-default')
@section('pagetitle')
<title>Admin: All Users</title>
@stop
@section('content')
<div class="page-content">
	<div class="page-header">
		<h1>
			All Users
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Get All Users detail
			</small>
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			@if($errors->any())
                	<h4 class="alert alert-danger">{{$errors->first()}}</h4>
                @endif
                @if(Session::get('message') !== null )
    				<div class="alert alert-success">
    				{{Session::get('message')}}
    							<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
    				</div>
    			@endif
			<div class="row">
				<div class="col-xs-12">
					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</th>
								<th class="detail-col">Details</th>
								<th>User name</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Date of Birth</th>
								<th>Created</th>
								<th>
									<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
									Updated
								</th>
								<th class="hidden-480">Status</th>

								<th></th>
							</tr>
						</thead>

						<tbody>
						@if(count($allUsers) > 0 )
                    		@foreach($allUsers as $user)
                    		<tr>
								<td class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</td>

								<td class="center">
									<div class="action-buttons">
										<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
											<i class="ace-icon fa fa-angle-double-down"></i>
											<span class="sr-only">Details</span>
										</a>
									</div>
								</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>@if(!empty($user->mobile_no))
            							{{ $user->mobile_no  }}
            						@else
            							{!! NotMentionedText() !!}
            						@endif
            					</td>
								<td>@if(!empty($user->date_of_birth))
            							{{ getFormettedDate($user->date_of_birth) }}
            						@else
            							{!! NotMentionedText() !!}
            						@endif
            					</td>
								<td>{{ getFormettedDateTime($user->created_at) }}</td>
								<td>{{ getFormettedDateTime($user->updated_at) }}</td>
								<td class="hidden-480">
									@if($user->verified == 1)
									<span class="label label-sm label-success">Verified</span>
									@else
									<span class="label label-sm label-warning">Pending</span>
									@endif
								</td>

								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<!-- <button class="btn btn-xs btn-success">
											<i class="ace-icon fa fa-check bigger-120"></i>
										</button> -->

										<button class="btn btn-xs btn-info">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>

										<a href="{{ url('/admin/'.$user->id.'/delete') }}" class="delete-btn btn btn-xs btn-danger">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>

										<!-- <button class="btn btn-xs btn-warning">
											<i class="ace-icon fa fa-flag bigger-120"></i>
										</button> -->
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
														<span class="blue">
															<i class="ace-icon fa fa-search-plus bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
							<tr class="detail-row">
								<td colspan="11">
									<div class="table-detail">
										<div class="row">
											<div class="col-xs-12 col-sm-2">
												<div class="text-center">
													<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="{{ URL::asset('assets/admin/avatars/profile-pic.jpg') }}" />
													<br />
													<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
														<div class="inline position-relative">
															<a class="user-title-label" href="#">
																<i class="ace-icon fa fa-circle light-green"></i>
																&nbsp;
																<span class="white">Alex M. Doe</span>
															</a>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-7">
												<div class="space visible-xs"></div>

												<div class="profile-user-info profile-user-info-striped">
													<div class="profile-info-row">
														<div class="profile-info-name"> Username </div>

														<div class="profile-info-value">
															<span>alexdoe</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Location </div>

														<div class="profile-info-value">
															<i class="fa fa-map-marker light-orange bigger-110"></i>
															<span>Netherlands, Amsterdam</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Age </div>

														<div class="profile-info-value">
															<span>38</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Joined </div>

														<div class="profile-info-value">
															<span>2010/06/20</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Last Online </div>

														<div class="profile-info-value">
															<span>3 hours ago</span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> About Me </div>

														<div class="profile-info-value">
															<span>Bio</span>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-3">
												<div class="space visible-xs"></div>
												<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

												<div class="space-6"></div>

												<form>
													<fieldset>
														<textarea class="width-100" resize="none" placeholder="Type something..."></textarea>
													</fieldset>

													<div class="hr hr-dotted"></div>

													<div class="clearfix">
														<label class="pull-left">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Email me a copy</span>
														</label>

														<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
															Submit
															<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
                    	@endif
						</tbody>
					</table>
				</div><!-- /.span -->
			</div><!-- /.row -->
			<div class="hr hr-18 dotted hr-double"></div>

				<div id="modal-table" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header no-padding">
								<div class="table-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										<span class="white">&times;</span>
									</button>
									Results for "Latest Registered Domains
								</div>
							</div>

							<div class="modal-body no-padding">
								<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
									<thead>
										<tr>
											<th>Domain</th>
											<th>Price</th>
											<th>Clicks</th>

											<th>
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												Update
											</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>
												<a href="#">ace.com</a>
											</td>
											<td>$45</td>
											<td>3,330</td>
											<td>Feb 12</td>
										</tr>

										<tr>
											<td>
												<a href="#">base.com</a>
											</td>
											<td>$35</td>
											<td>2,595</td>
											<td>Feb 18</td>
										</tr>

										<tr>
											<td>
												<a href="#">max.com</a>
											</td>
											<td>$60</td>
											<td>4,400</td>
											<td>Mar 11</td>
										</tr>

										<tr>
											<td>
												<a href="#">best.com</a>
											</td>
											<td>$75</td>
											<td>6,500</td>
											<td>Apr 03</td>
										</tr>

										<tr>
											<td>
												<a href="#">pro.com</a>
											</td>
											<td>$55</td>
											<td>4,250</td>
											<td>Jan 21</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="modal-footer no-margin-top">
								<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
									<i class="ace-icon fa fa-times"></i>
									Close
								</button>

								<ul class="pagination pull-right no-margin">
									<li class="prev disabled">
										<a href="#">
											<i class="ace-icon fa fa-angle-double-left"></i>
										</a>
									</li>

									<li class="active">
										<a href="#">1</a>
									</li>

									<li>
										<a href="#">2</a>
									</li>

									<li>
										<a href="#">3</a>
									</li>

									<li class="next">
										<a href="#">
											<i class="ace-icon fa fa-angle-double-right"></i>
										</a>
									</li>
								</ul>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@stop
@section('pagescripts')

<!-- page specific plugin scripts -->
<script src="{{ URL::asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/dataTables.select.min.js') }}"></script>
<!-- Page specific script -->
<script src="{{ URL::asset('assets/admin/js/admin-users.js') }}"></script>
@stop
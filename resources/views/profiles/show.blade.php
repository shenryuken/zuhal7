@extends('colorAdmin.app')

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	<link href="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/bootstrap4-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/address/address.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->
@endsection

@section('content')

<!-- begin page-header -->
<h1 class="page-header">X-Editable <small>header small text goes here...</small></h1>
<!-- end page-header -->

@if($profile && Auth::user()->user_id == $profile->user->user_id)

<!-- begin row -->
<div class="row">
	<!-- begin col-8 -->
	<div class="col-xl-8">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Form Editable</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<!-- begin table-responsive -->
			<div class="table-responsive">
				<table id="user" class="table table-condensed table-bordered">
					<thead>
						<tr>
							<th width="20%">Field Name</th>
							<th>Field Value</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="bg-light">Username</td>
							<td>{{ $profile->user->name }} </td>
							
						</tr>
						<tr>
							<td class="bg-light">Firstname</td>
							<td>{{ $profile->first_name }}</td>
						</tr>
						<tr>
							<td class="bg-light">Lastname</td>
							<td>{{ $profile->last_name }}</td>
						</tr>
						<tr>
							<td class="bg-light">Gender</td>
							<td>{{ $profile->gender }}</td>
						</tr>
						
						<tr>
							<td class="bg-light">Date of Birth</td>
							<td>{{ $profile->dob }}</td>
						</tr>
						<tr>
							<td class="bg-light">IC No</td>
							<td>{{ $profile->icno }}</td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Mobile)</td>
							<td>{{ $profile->contact_mobile }}</td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Home)</td>
							<td>{{ $profile->contact_home }}</td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Office)</td>
							<td>{{ $profile->contact_office }}</td>
						</tr>
						<tr>
							<td class="bg-light">Country</td>
							<td>{{$country}}</td>
						</tr>
						<tr>
							<td class="bg-light">State</td>
							<td>{{$state}}</td>
						</tr>
						<tr>
							<td class="bg-light">City</td>
							<td>{{$city}}</td>
						</tr>
						<tr>
							<td class="bg-light">Address</td>
							<td>{{$profile->street}}</td>
						</tr>
						<tr>
							<td>
								<a href="{{ route('profiles.edit',$profile->id)}}" class="btn btn-primary">Edit</a>
								<a href="{{URL::previous()}}" class="btn btn-grey">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- end table-responsive -->
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-8 -->
	<!-- begin col-4 -->
	<div class="col-xl-4">
		<div class="alert alert-yellow">
			<button class="close" data-dismiss="alert">&times;</button>
			<div class="f-s-14 m-b-10"><i class="fa fa-info-circle"></i> <b>Popover</b> edit mode is not supported in Bootstrap 4 yet.</div> We are now implement it with the inline edit mode until the plugin support with the popover in Bootstrap 4.
		</div>
		<h4 class="m-t-0 m-b-15"><b>Console</b><br /><small>(all ajax requests here are emulated)</small></h4>
		<div>
			<textarea id="console" rows="20" class="form-control" placeholder="start click on the editable text field and made the changes"></textarea>
		</div>
	</div>
	<!-- end col-4 -->
</div>
<!-- end row -->
@elseif(!$profile && Auth::user()->id == $user_id)
<span>No profile found. Please click <a href="{!! route('profiles.create') !!}">here</a> to create profile.</span>
@else
<span>You do not have authorize for this action!<a href="{{ url()->previous() }}">Back</a> </span>
@endif

@endsection
@section('scripts')

<script type="text/javascript"> 
	getCountries=<?php echo json_encode($getCountries) ?>;
</script>


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('colorAdmin/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/bootstrap4-editable/js/bootstrap-editable.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/address/address.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/typeaheadjs.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/x-editable-bs4/dist/inputs-ext/wysihtml5/wysihtml5.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/select2/dist/js/select2.full.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/jquery-mockjax/dist/jquery.mockjax.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/moment/min/moment.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
@endsection
@extends('colorAdmin.app')

@section('styles')

 
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

@if(Auth::user()->profile)

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
							<td><input type="text" class="form-control" name="username" value="{{ $profile->user->name }}"> </td>
							
						</tr>
						<tr>
							<td class="bg-light">Firstname</td>
							<td><input type="text" class="form-control" name="first_name" value="{{ $profile->first_name }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Lastname</td>
							<td><input type="text" class="form-control" name="last_name" value="{{ $profile->last_name }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Gender</td>
							<td><input type="text" class="form-control" name="gender" value="{{ $profile->gender }}"></td>
						</tr>
						
						<tr>
							<td class="bg-light">Date of Birth</td>
							<td><input type="text" class="form-control" name="dob" value="{{ $profile->dob }}"></td>
						</tr>
						<tr>
							<td class="bg-light">IC No</td>
							<td><input type="text" class="form-control" name="icno" value="{{ $profile->icno }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Mobile)</td>
							<td><input type="text" class="form-control" name="contact_mobile" value="{{ $profile->contact_mobile }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Home)</td>
							<td><input type="text" class="form-control" name="contact_home" value="{{ $profile->contact_home }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Telephone (Office)</td>
							<td><input type="text" class="form-control" name="contact_mobile" value="{{ $profile->contact_office }}"></td>
						</tr>
						<tr>
							<td class="bg-light">Country</td>
							<td><!-- <input type="text" class="form-control" name="country" value="{{$profile->country}}"> -->
								Current = <span>{{ $country }} *leave blank if same</span>
								<select name="country" class="form-control" id="country">

                                        <option value="">--Select Country--</option>
                                        @foreach ($getCountries as $country => $value)
                                        <option value="{{ $country }}"  > {{ $value }}</option>   
                                        @endforeach
                                    </select>
							</td>
						</tr>
						<tr>
							<td class="bg-light">State</td>
							<td><!-- <input type="text" class="form-control" name="state" value="{{$profile->state}}"> -->
								Current = <span>{{ $state }} *leave blank if same</span>
								<select name="state" class="form-control" id="state">
                                  
                                </select>
							</td>
						</tr>
						<tr>
							<td class="bg-light">City </td>
							<td><!-- <input type="text" class="form-control" name="city" value="{{$profile->city}}"> -->Current = <span>{{ $city }} *leave blank if same</span>
								<select name="city" class="form-control" id="city">
                                     

                                 </select>
							</td>
						</tr>
						<tr>
							<td class="bg-light">Street</td>
							<td><input type="text" class="form-control" name="street" value="{{$profile->street}}"></td>
						</tr>
						<tr>
							<td>
								<a href="{{ route('profiles.edit',$profile->id)}}" class="btn btn-primary">Edit</a>
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
@else
<span>No profile found. Please click <a href="{!! route('profiles.create') !!}">here</a> to create profile.</span>
@endif

@endsection
@section('scripts')
<script type="text/javascript"> 
	getCountries=<?php echo json_encode($getCountries) ?>;
</script>
<script type="text/javascript">
 	$(document).ready(function() {

    $('#country').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: "{{url('getStates')}}/"+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="state"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="state"]').append('<option  {{ ( ' +key+' == $profile->state_id) ? 'selected' : '' }} value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="state"]').empty();
            $('select[name="city"]').empty();
        }

    });

    $('#state').on('change', function(){
        var stateId = $(this).val();
        if(stateId) {
            $.ajax({
                url: "{{url('getCities')}}/"+stateId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="city"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="city"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="city"]').empty();
        }

    });

});
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
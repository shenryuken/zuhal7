@extends('colorAdmin.app')

@section('styles')
<link href="{{ asset('colorAdmin/plugins/smartwizard/dist/css/smart_wizard.css')}}" rel="stylesheet" />
<!-- <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" /> -->
	<!-- <link href="{{ asset('colorAdmin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css')}}" rel="stylesheet" /> -->
@endsection

@section('content')
	@if ($errors->any())
  	<div class="alert alert-danger">
    	<ul>
        	@foreach ($errors->all() as $error)
          		<li>{{ $error }}</li>
        	@endforeach
    	</ul>
  	</div><br />
    @endif
	<form action="{{ route('profiles.store') }}" method="POST" class="form-control-with-bg">
		@csrf
		<!-- begin wizard -->
		<div id="wizard">
			<!-- begin wizard-step -->
			<ul>
				<li>
					<a href="#step-1">
						<span class="number">1</span> 
						<span class="info">
							Personal Info
							<small>Name, IC No and DOB</small>
						</span>
					</a>
				</li>
				<li>
					<a href="#step-2">
						<span class="number">2</span> 
						<span class="info">
							Address
							<small>Street, city, postcode, state & Country</small>
						</span>
					</a>
				</li>
				<li>
					<a href="#step-3">
						<span class="number">3</span>
						<span class="info">
							Enter your contact
							<small>Email and phone no. is required</small>
						</span>
					</a>
				</li>
				<li>
					<a href="#step-4">
						<span class="number">4</span> 
						<span class="info">
							Completed
							<small>Complete Registration</small>
						</span>
					</a>
				</li>
			</ul>
			<!-- end wizard-step -->
			<!-- begin wizard-content -->
			<div>
				<!-- begin step-1 -->
				<div id="step-1">
					<!-- begin fieldset -->
					<fieldset>
						<!-- begin row -->
						<div class="row">
							<!-- begin col-8 -->
							<div class="col-xl-8 offset-xl-2">
								<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Personal info about yourself</legend>
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">First Name</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="first_name" placeholder="John" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Last Name</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="last_name" placeholder="Smith" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Date of Birth</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="dob" class="form-control" id="masked-input-date" placeholder="dd/mm/yyyy">
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Gender</label>
									<div class="col-lg-9 col-xl-6">
										<div class="row row-space-6">
											<div class="col-4">
												<select class="form-control" name="gender">
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">IC No</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="icno" placeholder="991231-11-5555" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
							</div>
							<!-- end col-8 -->
						</div>
						<!-- end row -->
					</fieldset>
					<!-- end fieldset -->
				</div>
				<!-- end step-1 -->
				<!-- begin step-2 -->
				<div id="step-2">
					<!-- begin fieldset -->
					<fieldset>
						<!-- begin row -->
						<div class="row">
							<!-- begin col-8 -->
							<div class="col-xl-8 offset-xl-2">
								<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">You address info, so that we can easily reach you</legend>
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Address</label>
									<div class="col-lg-9">
										<input type="text" name="address1" placeholder="Address 1" class="form-control m-b-10" />
										<input type="text" name="address2" placeholder="Address 2" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Street</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="street" placeholder="No. 20 Street 1" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">City</label>
									<div class="col-lg-9 col-xl-6">
										<select name="city" class="form-control" id="city">
                                     

                                 		</select>
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Postcode</label>
									<div class="col-lg-9 col-xl-6">
										<input type="text" name="postcode" placeholder="43200" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">State</label>
									<div class="col-lg-9 col-xl-6">
										<select name="state" class="form-control" id="state">
                                     

                                 		</select>
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Country</label>
									<div class="col-lg-9 col-xl-6">
										<select name="country" class="form-control" id="country">
                                        <option value="">--Select Country--</option>
                                        @foreach ($getCountries as $country => $value)
                                        <option value="{{ $country }}"> {{ $value }}</option>   
                                        @endforeach
                                    </select>
									</div>
								</div>
								<!-- end form-group row -->
							</div>
							<!-- end col-8 -->
						</div>
						<!-- end row -->
					</fieldset>
					<!-- end fieldset -->
				</div>
				<!-- end step-2 -->
				<!-- begin step-3 -->
				<div id="step-3">
					<!-- begin fieldset -->
					<fieldset>
						<!-- begin row -->
						<div class="row">
							<!-- begin col-8 -->
							<div class="col-xl-8 offset-xl-2">
								<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">You contact info, so that we can easily reach you</legend>
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Phone Number (mobile)</label>
									<div class="col-lg-9 col-xl-6">
										<input type="test" name="contact_mobile" placeholder="123-456-7890" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Phone Number (home)</label>
									<div class="col-lg-9 col-xl-6">
										<input type="test" name="contact_home" placeholder="123-456-7890" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
								<!-- begin form-group row -->
								<div class="form-group row m-b-10">
									<label class="col-lg-3 text-lg-right col-form-label">Phone Number (office)</label>
									<div class="col-lg-9 col-xl-6">
										<input type="test" name="contact_office" placeholder="123-456-7890" class="form-control" />
									</div>
								</div>
								<!-- end form-group row -->
							</div>
							<!-- end col-8 -->
						</div>
						<!-- end row -->
					</fieldset>
					<!-- end fieldset -->
				</div>
				<!-- end step-3 -->
				<!-- begin step-4 -->
				<div id="step-4">
					<div class="jumbotron m-b-0 text-center">
						<h2 class="display-4">Are You Ready?</h2>
						<p class="lead mb-4">Are you confirming that the details are correct?<br> Please make sure the details are correct and do not contain any false information, in the event of any inaccurate information then you are not eligible for any benefit from the program.</p>
						<p><button type="submit" class="btn btn-primary btn-block btn-lg">Procees to submit</button></p>
					</div>
				</div>
				<!-- end step-4 -->
			</div>
			<!-- end wizard-content -->
		</div>
		<!-- end wizard -->
	</form>
	<!-- end wizard-form -->			
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

                        $('select[name="state"]').append('<option value="'+ key +'">' + value + '</option>');

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

<script src="{{ asset('colorAdmin/plugins/smartwizard/dist/js/jquery.smartWizard.js')}}"></script>
<script src="{{ asset('colorAdmin/js/demo/form-wizards.demo.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!-- <script src="{{ asset('colorAdmin/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/moment/min/moment.min.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/tag-it/js/tag-it.min.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/plugins/select2/dist/js/select2.min.js')}}"></script>
	<!-- <script src="{{ asset('colorAdmin/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-show-password/dist/bootstrap-show-password.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js')}}"></script> -->
	<!-- <script src="{{ asset('colorAdmin/plugins/clipboard/dist/clipboard.min.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/js/demo/form-plugins.demo.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
@endsection


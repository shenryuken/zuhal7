@extends('colorAdmin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong><h4>Introducer Form</h4></strong></div>

                <div class="card-body">
					<!-- begin register-header -->
					<h1 class="register-header">
						Register New User
					</h1>
					<!-- end register-header -->
					<!-- begin register-content -->
					<div class="register-content">
						@if ($errors->any())
					      	<div class="alert alert-danger">
					        	<ul>
					            	@foreach ($errors->all() as $error)
					              		<li>{{ $error }}</li>
					            	@endforeach
					        	</ul>
					      	</div><br />
					    @endif
						<form action="{{ route('users.store') }}" method="POST" class="margin-bottom-0">
							@csrf
							<label class="control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
							<div class="row row-space-10">
								<div class="col-md-6 m-b-15">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

	                                @error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>
							<label class="control-label">Email <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<input type="text" name="email" class="form-control" placeholder="Email address" required />
								</div>
							</div>
							<label class="control-label">Re-enter Email <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<input type="text" name="email_confirmation" class="form-control" placeholder="Re-enter email address" required />
								</div>
							</div>
							
							<div class="checkbox checkbox-css m-b-30">
								<div class="checkbox checkbox-css m-b-30">
									<input type="checkbox" id="agreement_checkbox" value="">
									<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
									</label>
								</div>
							</div>
							<div class="register-buttons">
								<button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
							</div>
							
							<hr />
							<p class="text-center mb-0">
								&copy; Color Admin All Right Reserved 2020
							</p>
						</form>
					</div>
					<!-- end register-content -->
					</div>
            </div>
        </div>
    </div>
</div>
@endsection
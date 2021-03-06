@extends('colorAdmin.app')

@section('styles')

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('colorAdmin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('colorAdmin/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" />

	<link href="{{ asset('colorAdmin/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')

<div class="row">
	<!-- begin col-10 -->
	<div class="col-xl-12">
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Users List <span><a href="{{route('users.create')}}" class="btn btn-primary">Add User</a></span></h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				<table id="data-table-combine" class="table table-striped table-bordered table-td-valign-middle">
					<thead>
						<tr>
							<th width="1%"></th>
							<th class="text-nowrap">Name</th>
							<th class="text-nowrap">Email</th>
							<th class="text-nowrap">Referral</th>
							<th class="text-nowrap">Total Referrals</th>
							<th class="text-nowrap">Action</th>
							
						</tr>
					</thead>
					<tbody>
					@php
						$count = 1;
					@endphp
					@foreach ($users as $user)
				        @if ($loop->odd)
				        <tr class="odd gradeX">
							<td width="1%" class="f-s-600 text-inverse">{{$count++}}</td>
							
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->referral}}</td>
							<td>{{$user->total_referrals}}</td>
							<td class="with-btn" nowrap="">
								<a href="{!! route('profiles.show', [$user->id]) !!}" class="btn btn-sm btn-primary width-60 m-r-2">Profile</a>
								<form method="POST" action="{{route('users.delete', $user->id)}}" class="btn">
							        @csrf
                    				@method('DELETE')
							        <input type="submit" class="btn btn-sm btn-danger delete-user" value="Delete">
							    </form>
							</td>
							
						</tr>
				        @elseif ($loop->even)
				        <tr class="even gradeC">
							<td width="1%" class="f-s-600 text-inverse">{{$count++}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->referral}}</td>
							<td>{{$user->total_referrals}}</td>
							<td class="with-btn" nowrap="">
								<a href="{!! route('profiles.show', [$user->id]) !!}" class="btn btn-sm btn-primary width-60 m-r-2">Profile</a>
								<form method="POST" action="{{route('users.delete', $user->id)}}" class="btn" id="form-delete">
							        @csrf
                    				@method('DELETE')
							        <input type="submit" class="btn btn-sm btn-danger delete-user" value="Delete">
							    </form>
							</td>
							
						</tr>
				        @endif
					@endforeach
					</tbody>
				</table>

			</div>
			<!-- end panel-body -->
		</div>
	</div>
	<!-- end col-10 -->
</div>
<!-- end row -->

@endsection
@section('scripts')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('colorAdmin/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-autofill/js/dataTables.autofill.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-colreorder/js/dataTables.colreorder.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-colreorder-bs4/js/colreorder.bootstrap4.min.js')}}"></script>
	<!-- <script src="{{ asset('colorAdmin/plugins/datatables.net-keytable/js/dataTables.keytable.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js')}}"></script>
	<!-- <script src="{{ asset('colorAdmin/plugins/datatables.net-select/js/dataTables.select.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script> -->
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/pdfmake/build/pdfmake.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/pdfmake/build/vfs_fonts.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/jszip/dist/jszip.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/js/demo/table-manage-combine.demo.js')}}"></script>

	<script src="{{ asset('colorAdmin/plugins/gritter/js/jquery.gritter.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/js/demo/ui-modal-notification.demo.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
	    $('.delete-user').click(function(e){
	         e.preventDefault() // Don't post the form, unless confirmed
	         if (confirm('Are you sure?')) {
	             // Post the form
	             $(e.target).closest('form').submit() // Post the surrounding form
	         }
	    });
	</script>
@endsection


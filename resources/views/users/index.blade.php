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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
@endsection

@section('content')

<div class="row">
	<!-- begin col-10 -->
	<div class="col-xl-12">
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Users List </h4>
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
							<th width="1%" data-orderable="false"></th>
							<th class="text-nowrap">Name</th>
							<th class="text-nowrap">Email</th>
							<th class="text-nowrap">Referral</th>
							<th class="text-nowrap">Total Referrals</th>
							<th class="text-nowrap">CSS grade</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($users as $user)
				        @if ($loop->odd)
				        <tr class="odd gradeX">
							<td width="1%" class="f-s-600 text-inverse">1</td>
							<td width="1%" class="with-img"><img src="{{ asset('colorAdmin/img/user/user-1.jpg')}}" class="img-rounded height-30" /></td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->referral}}</td>
							<td>{{$user->total_referrals}}</td>
							<td class="with-img">X</td>
						</tr>
				        @elseif ($loop->even)
				        <tr class="even gradeC">
							<td width="1%" class="f-s-600 text-inverse">2</td>
							<td width="1%" class="with-img"><img src="{{ asset('colorAdmin/img/user/user-2.jpg')}}" class="img-rounded height-30" /></td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->referral}}</td>
							<td>{{$user->total_referrals}}</td>
							<td>C</td>
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
	<script src="{{ asset('colorAdmin/plugins/datatables.net-keytable/js/dataTables.keytable.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-select/js/dataTables.select.min.js')}}"></script>
	<script src="{{ asset('colorAdmin/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
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
	<!-- ================== END PAGE LEVEL JS ================== -->
@endsection
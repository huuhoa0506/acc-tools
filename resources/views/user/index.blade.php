@extends('layouts.master')

@section('content')
<!--begin::Section-->
<div class="m-section">
	<div class="m-section__content">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Modal Demos
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<table class="table">
					<thead class="thead-inverse">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user['name'] }}</td>
							<td>{{ $user['email'] }}</td>
							<td>{{ $user['phone'] }}</td>
							<td>{{ $user['address'] }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="m-portlet__body">
				{!! $users->links() !!}
			</div>
		</div>	
	</div>	
</div>	
<!--end::Section-->
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('assets/demo/default/custom/components/datatables/base/data-ajax.js') }}"></script>
@endsection
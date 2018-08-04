@extends('layouts.master')


@section('content')
<!--begin::Section-->
<div class="m-section">
	<div class="m-section__content">
		<table class="table">
			<thead class="thead-inverse">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<th scope="row"></th>
					<td>{{ $user['name'] }}</td>
					<td>{{ $user['email'] }}</td>
					<td>{{ $user['phone'] }}</td>
					<td>{{ $user['address'] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="m-section__content">
		{!! $users->links() !!}
	</div>
</div>
<!--end::Section-->
@endsection


@section('js')
	<script type="text/javascript" src="{{ asset('assets/demo/default/custom/components/datatables/base/data-ajax.js') }}"></script>
@endsection
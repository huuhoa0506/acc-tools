@extends('layouts.master')

@section('content')
<!--begin::Section-->
<div class="m-section" id="app">
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
				{!! Form::open(['route' => 'mail.queue', 'method' => 'POST']) !!}
				<div class="form-group">
				    {{ Form::submit('Send', ['class' => 'btn btn-info']) }}	
				</div>
				<table id="r_list" class="table">
					<thead class="thead-inverse">
						<tr>
							<th>{!! Form::checkbox('select-all', null, false, ['v-on:click' => "handleClick"]) !!}</th>
							<th>Agent Email</th>
							<th>Title</th>
							<th>Is Sent</th>
							<th>Sent at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($remindings as $reminding)
						<tr>
							<td>{!! Form::checkbox('ids[]', $reminding->getKey()) !!}</td>
							<td>{{ $reminding['email'] }}</td>
							<td>{{ $reminding['title'] }}</td>
							<td>{{ $reminding['is_sent'] }}</td>
							<td>{{ $reminding['sent_at'] }}</td>
							<td>
								<!-- {{ Form::ResourceActions($reminding, 'reminders') }} -->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! Form::close() !!}
			</div>
			<div class="m-portlet__body">
				{!! $remindings->links() !!}
			</div>
		</div>	
	</div>	
</div>	
<!--end::Section-->
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[name="select-all"]').on('change', function(event){
				$('#r_list').find('input[name="ids[]"]').prop('checked', $(this).prop('checked'));
			});
		});
	</script>
@endsection
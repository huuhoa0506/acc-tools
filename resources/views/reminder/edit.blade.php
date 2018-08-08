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
				{!! Form::model($reminding, ['route' => ['reminders.update', $reminding->id], 'method' => 'PUT']) !!}
					<div class="form-group">
					    {{ Form::label('Email', null, ['class' => 'control-label']) }}
					    {{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
					    {{ Form::label('Title', null, ['class' => 'control-label']) }}
					    {{ Form::text('title', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
					    {{ Form::label('Content', null, ['class' => 'control-label']) }}
					    {{ Form::textarea('content', null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Save', ['class' => 'btn btn-info']) }}	
						{{ Form::submit('Cancel', ['type' => 'reset', 'class' => 'btn btn-danger']) }}
					</div>
				{!! Form::close() !!}
			</div>
		</div>	
	</div>	
</div>	
<!--end::Section-->
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('assets/demo/default/custom/components/datatables/base/data-ajax.js') }}"></script>
@endsection
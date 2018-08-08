@extends('layouts.master')

@section('content')
<!--begin::Section-->
<div class="m-section">
	<div class="m-section__content">
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Custom Controls
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right" method="POST" enctype="multipart/form-data" action="{{ route('import.reminder') }}">
				@csrf
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">Title</label>
						<input type="text" class="form-control m-input m-input--air" name="title">
					</div>
					<div class="form-group m-form__group">
						<label for="exampleTextarea">Content</label>
						<textarea class="form-control m-input m-input--air" name="content" rows="3"></textarea>
					</div>
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">File Browser</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" name="file" id="customFile">
						  	<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</form>
			<!--end::Form-->			
		</div>
	</div>	
</div>	
<!--end::Section-->
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('assets/demo/default/custom/components/datatables/base/data-ajax.js') }}"></script>
@endsection
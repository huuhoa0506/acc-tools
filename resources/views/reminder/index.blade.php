@extends('layouts.master')

@section('content')
<!--begin::Section-->
<div class="m-section" id="app">
	<div class="m-section__content">
		@if ($errors->any())
		    @foreach ($errors->all() as $error)
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					</button>
				  	<strong>{{ $error }}</strong>
				</div>
            @endforeach
		@endif



		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Agent Reminder - index
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				{!! Form::open(['route' => 'mail.queue', 'method' => 'POST']) !!}
				<table id="r_list" class="table">	
					<thead class="thead-inverse">
						<tr>
							<th>{!! Form::checkbox('select-all', null, false, ['v-model' => "checked"]) !!}</th>
							<th>Agent Email</th>
							<th>Title</th>
							<th>Is Sent</th>
							<th>Sent at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($remindings as $key => $reminding)
						<tr>
							<td>{!! Form::checkbox('ids[]', $reminding->getKey(), false, ['class' => 'checkbox-item']) !!}</td>
							<td>{{ $reminding['email'] }}</td>
							<td>{{ $reminding['title'] }}</td>
							<td>{{ $reminding['is_sent'] }}</td>
							<td>{{ $reminding['sent_at'] }}</td>
							<td>
								<!-- {{ Form::ResourceActions($reminding, 'reminders') }} -->
							</td>
						</tr>
						@endforeach
						<tr><td colspan="6">
							<router-link to="/foo">Go to Foo</router-link>
    					<router-link to="/bar">Go to Bar</router-link>
						</td></tr>
						<tr><td colspan="6">
							  <router-view></router-view>
						</td></tr>
					</tbody>
				</table>
				<div class="form-group">
				    {{ Form::submit('Send', ['class' => 'btn btn-info']) }}	
				</div>
				{!! Form::close() !!}
			</div>
			<div class="m-portlet__body">Display: {{ $remindings->count() }} of {{ $remindings->total() }}</div>
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

		const app = new Vue({
			router,
			data: {
				checked: false,
			},
		    el: '#r_list',
		    mounted(){
		    	this.checkboxes = document.getElementsByClassName('checkbox-item');
		    },
		    updated(){
		    	for(input of this.checkboxes){
	    			input.checked = this.checked;
	    		};

		    }
		});

	</script>
@endsection
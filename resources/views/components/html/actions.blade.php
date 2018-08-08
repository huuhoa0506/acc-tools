<div class="m-demo__preview  m-demo__preview--btn">
	<div class="row">
		<div class="col-xs-6">
			<a href="{{ route(sprintf('%s.edit', $resource), ['id' => $model->getKey()]) }}" class="btn btn-primary">Edit</a>		
		</div>&nbsp;
		<div class="col-xs-6">
			{!! Form::open(['route' => [sprintf('%s.destroy', $resource), $model->getKey()], 'method' => 'delete' ]) !!}
				<button type="submit" class="btn btn-danger">Delete</button>
			{!! Form::close() !!}
		</div>
	</div>
</div>
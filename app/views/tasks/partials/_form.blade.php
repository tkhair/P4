<div class="form-group">
	{{ Form::label('name', 'Task name:') }}
	{{ Form::text('name', null, ['placeholder' => 'Task name', 'class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Task description:') }}
	{{ Form::textarea('description', null, ['placeholder' => 'Task description', 'class' => 'form-control', 'rows' => 5]) }}
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>

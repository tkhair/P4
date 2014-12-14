<div class="form-group">
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', null, ['placeholder' => 'Project name', 'class' => 'form-control']) }}
</div>
<button type="submit" class="btn btn-default">{{ $submit }}</button>

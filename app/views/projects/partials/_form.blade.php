<div class="form-group">
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', null, ['placeholder' => 'Project name', 'class' => 'form-control']) }}
</div>
{{ Form::submit($submit, ['class' => 'btn btn-primary']) }}

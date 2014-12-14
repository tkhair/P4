<div class="form-group">
	{{ Form::label('email', 'Email:') }}
	{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
</div>

<div class="form-group">
	{{ Form::label('password', 'Password:') }}
	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
</div>

{{ Form::submit($submit, ['class' => 'btn btn-primary']) }}
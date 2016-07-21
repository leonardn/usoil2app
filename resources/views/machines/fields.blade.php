<!-- Machine Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_name', 'Machine Name:') !!}
    {!! Form::text('machine_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_type', 'Machine Type:') !!}
    {!! Form::text('machine_type', null, ['class' => 'form-control']) !!}
</div>

 <!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('status', false) !!}
	{!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
	<label for="is-active" class="checkbox-inline">
		is Active?
	</label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('machines.index') !!}" class="btn btn-default">Cancel</a>
</div>

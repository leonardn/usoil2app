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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('machines.index') !!}" class="btn btn-default">Cancel</a>
</div>

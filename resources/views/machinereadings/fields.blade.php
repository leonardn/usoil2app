<!-- Restaurant Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_id', 'Restaurant Name:') !!}
    {!! Form::text('restaurant_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_id', 'Machine Name:') !!}
    {!! Form::text('machine_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Temperature Reading Field -->
<div class="form-group col-sm-6">
    {!! Form::label('temperature_reading', 'Temperature Reading:') !!}
    {!! Form::text('temperature_reading', null, ['class' => 'form-control']) !!}
</div>

<!-- Reading Date/Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading_date_time', 'Reading Date/Time:') !!}
    {!! Form::text('reading_date_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('machinereadings.index') !!}" class="btn btn-default">Cancel</a>
</div>

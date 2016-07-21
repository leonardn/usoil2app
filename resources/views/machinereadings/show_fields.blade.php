<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $machinereadings->id !!}</p>
</div>

<!-- Restaurant Name Field -->
<div class="form-group">
    {!! Form::label('restaurant_id', 'Restaurant Name:') !!}
    <p>{!! $machinereadings->restaurant_name !!}</p>
</div>

<!-- Machine Name Field -->
<div class="form-group">
    {!! Form::label('machine_id', 'Machine Name:') !!}
    <p>{!! $machinereadings->machine_name !!}</p>
</div>

<!-- Temperature Reading Field -->
<div class="form-group">
    {!! Form::label('temperature_reading', 'Temperature Reading:') !!}
    <p>{!! $machinereadings->temperature_reading !!}</p>
</div>

<!-- Reading Date/Time Field -->
<div class="form-group">
    {!! Form::label('reading_date_time', 'Reading Date/Time:') !!}
    <p>{!! $machinereadings->reading_date_time !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $machinereadings->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $machinereadings->updated_at !!}</p>
</div>


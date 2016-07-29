<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $machine->id !!}</p>
</div>

<!-- Machine Name Field -->
<div class="form-group">
    {!! Form::label('machine_name', 'Machine Name:') !!}
    <p>{!! $machine->machine_name !!}</p>
</div>

<!-- Machine Type Field -->
<div class="form-group">
    {!! Form::label('machine_type', 'Machine Type:') !!}
    <p>{!! $machine->machine_type !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $machine->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $machine->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $machine->updated_at !!}</p>
</div>


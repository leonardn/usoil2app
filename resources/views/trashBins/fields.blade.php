<!-- Restaurant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_id', 'Restaurant Id:') !!}
    {!! Form::text('restaurant_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Log Option Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('log_option_id', 'Log Option Id:') !!}
    {!! Form::select('log_option_id', ['Daily' => 'Daily', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly'], null, ['class' => 'form-control']) !!}
</div>

<!-- Trash Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trash_weight', 'Trash Weight:') !!}
    {!! Form::number('trash_weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Creation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creation_date', 'Creation Date:') !!}
    {!! Form::date('creation_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trashBins.index') !!}" class="btn btn-default">Cancel</a>
</div>

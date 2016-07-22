<!-- Fryer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fryer_id', 'Fryer Id:') !!}
    {!! Form::text('fryer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Measured Tpm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('measured_tpm', 'Measured Tpm:') !!}
    {!! Form::number('measured_tpm', null, ['class' => 'form-control']) !!}
</div>

<!-- Oil Temp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oil_temp', 'Oil Temp:') !!}
    {!! Form::number('oil_temp', null, ['class' => 'form-control']) !!}
</div>

<!-- Changed Oil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('changed_oil', 'Changed Oil:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('changed_oil', false) !!}
        {!! Form::checkbox('changed_oil', '1', null) !!} 1
    </label>
</div>

<!-- Quantity Added Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity_added', 'Quantity Added:') !!}
    {!! Form::number('quantity_added', null, ['class' => 'form-control']) !!}
</div>

<!-- Oil Moved Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oil_moved', 'Oil Moved:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('oil_moved', false) !!}
        {!! Form::checkbox('oil_moved', '1', null) !!} 1
    </label>
</div>

<!-- Amount Moved Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_moved', 'Amount Moved:') !!}
    {!! Form::number('amount_moved', null, ['class' => 'form-control']) !!}
</div>

<!-- Moved To Fryer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('moved_to_fryer_id', 'Moved To Fryer Id:') !!}
    {!! Form::text('moved_to_fryer_id', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('fryerTMPSs.index') !!}" class="btn btn-default">Cancel</a>
</div>

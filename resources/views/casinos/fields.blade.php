<!-- Casino Trade Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_trade_name', 'Casino Trade Name:') !!}
    {!! Form::text('casino_trade_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_email', 'Casino Email:') !!}
    {!! Form::email('casino_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Address1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_address1', 'Casino Address1:') !!}
    {!! Form::text('casino_address1', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Address2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_address2', 'Casino Address2:') !!}
    {!! Form::text('casino_address2', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_city', 'Casino City:') !!}
    {!! Form::text('casino_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_state', 'Casino State:') !!}
    {!! Form::text('casino_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_zipcode', 'Casino Zipcode:') !!}
    {!! Form::text('casino_zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_phone', 'Casino Phone:') !!}
    {!! Form::text('casino_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Phone Ext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_phone_ext', 'Casino Phone Ext:') !!}
    {!! Form::text('casino_phone_ext', null, ['class' => 'form-control']) !!}
</div>

<!-- Casino Ein Field -->
<div class="form-group col-sm-6">
    {!! Form::label('casino_ein', 'Casino Ein:') !!}
    {!! Form::text('casino_ein', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Payable Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_payable_name', 'Account Payable Name:') !!}
    {!! Form::text('account_payable_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_title', 'Contact Person Title:') !!}
    {!! Form::text('contact_person_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_first_name', 'Contact Person First Name:') !!}
    {!! Form::text('contact_person_first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_last_name', 'Contact Person Last Name:') !!}
    {!! Form::text('contact_person_last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_email', 'Contact Person Email:') !!}
    {!! Form::text('contact_person_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_phone', 'Contact Person Phone:') !!}
    {!! Form::text('contact_person_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Phone Ext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_phone_ext', 'Contact Person Phone Ext:') !!}
    {!! Form::text('contact_person_phone_ext', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} is Active?
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('casinos.index') !!}" class="btn btn-default">Cancel</a>
</div>

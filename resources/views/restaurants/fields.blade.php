<!-- Restaurant Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_name', 'Restaurant Name:') !!}
    {!! Form::text('restaurant_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Restaurant Location Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_location_code', 'Restaurant Location Code:') !!}
    {!! Form::text('restaurant_location_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Restaurant Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_location', 'Restaurant Location:') !!}
    {!! Form::text('restaurant_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Restaurant Location Lati Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_location_lati', 'Restaurant Location Lati:') !!}
    {!! Form::text('restaurant_location_lati', null, ['class' => 'form-control']) !!}
</div>

<!-- Restaurant Location Long Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_location_long', 'Restaurant Location Long:') !!}
    {!! Form::text('restaurant_location_long', null, ['class' => 'form-control']) !!}
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
    {!! Form::email('contact_person_email', null, ['class' => 'form-control']) !!}
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

<!-- Activation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activation_date', 'Activation Date:') !!}
    {!! Form::date('activation_date', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('restaurants.index') !!}" class="btn btn-default">Cancel</a>
</div>

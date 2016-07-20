<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('restaurants.index') !!}" class="btn btn-default pull-right">Discard</a>
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-left']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Restaurants Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6">
                    <a href="#" class="pull-right">Show</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Restaurant Name Field -->
            {!! Form::text('restaurant_name', null, ['class' => 'form-control', 'placeholder' => 'Restaurant Name']) !!}
        </div>
        <div class="col-md-8 row-spacer-top-bot checkbox checkbox-primary cb-padding-top">
            <!-- Status Field -->
            {!! Form::hidden('status', false) !!}
            {!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
            <label for="is-active" class="checkbox-inline">
                is Active?
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Activation Date Field -->
            {!! Form::date('activation_date', null, ['class' => 'form-control', 'placeholder' => 'Activation Date']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Restaurant Location Code Field -->
            {!! Form::text('restaurant_location_code', null, ['class' => 'form-control', 'placeholder' => 'Location Code']) !!}
        </div>
        <div class="col-md-9 row-spacer-top-bot">
            <!-- Restaurant Location Field -->
            {!! Form::text('restaurant_location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Restaurant Location Lati Field -->
            {!! Form::text('restaurant_location_lati', null, ['class' => 'form-control', 'placeholder' => 'Latitude']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Restaurant Location Long Field -->
            {!! Form::text('restaurant_location_long', null, ['class' => 'form-control', 'placeholder' => 'longitude']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Restaurant Contact Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6">
                    <a href="#" class="pull-right">Show</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Title Field -->
            {!! Form::text('contact_person_title', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Title']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person First Name Field -->
            {!! Form::text('contact_person_first_name', null, ['class' => 'form-control', 'placeholder' => 'Contact Person First Name']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Last Name Field -->
            {!! Form::text('contact_person_last_name', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Last Name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Email Field -->
            {!! Form::text('contact_person_email', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Email']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Phone Field -->
            {!! Form::text('contact_person_phone', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Phone']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Contact Person Phone Ext Field -->
            {!! Form::text('contact_person_phone_ext', null, ['class' => 'form-control', 'placeholder' => 'Ext']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

<!-- http://stackoverflow.com/a/31440360 -->
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10">
                <h4>{{ $moduleTitle }}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('corporations.index') !!}" class="btn btn-default">Discard</a>
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Corporation Details</h3>
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
    <div class="row row-spacer-top-bot">
        <div class="col-md-4">
            <!-- Corporation Name Field -->
            {!! Form::text('corporation_name', null, ['class' => 'form-control', 'placeholder' => 'Corporation Name']) !!}
        </div>
        <div class="col-md-8">
            <!-- Status Field -->
            <label class="checkbox-inline">
                {!! Form::hidden('status', false) !!}
                {!! Form::checkbox('status', '1', null) !!} is Active?
            </label>
        </div>
    </div>
    <div class="row row-spacer-top-bot">
        <div class="col-md-6">
            <!-- Corporation Address1 Field -->
            {!! Form::text('corporation_address1', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
        </div>
        <div class="col-md-6">
            <!-- Corporation Address2 Field -->
            {!! Form::text('corporation_address2', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
        </div>
    </div>
    <div class="row row-spacer-top-bot">
        <div class="col-md-3">
            <!-- Corporation City Field -->
            {!! Form::text('corporation_city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
        </div>
        <div class="col-md-3">
            <!-- Corporation State Field -->
            {!! Form::text('corporation_state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
        </div>
        <div class="col-md-3">
            <!-- Corporation Zipcode Field -->
            {!! Form::text('corporation_zipcode', null, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
        </div>
    </div>
    <div class="row row-spacer-top-bot">
        <div class="col-md-3">
            <!-- Corporation Phone Field -->
            {!! Form::text('corporation_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No.']) !!}
        </div>
        <div class="col-md-2">
            <!-- Corporation Phone Ext Field -->
            {!! Form::text('corporation_phone_ext', null, ['class' => 'form-control', 'placeholder' => 'Ext']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Corporation Contact Details</h3>
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
    <div class="row row-spacer-top-bot">
        <div class="col-md-4">
            <!-- Contact Person Title Field -->
            {!! Form::text('contact_person_title', null, ['class' => 'form-control', 'placeholder' => 'Job Title']) !!}
        </div>
    </div>
    <div class="row row-spacer-top-bot">
        <div class="col-md-4">
            <!-- Contact Person First Name Field -->
            {!! Form::text('contact_person_first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
        </div>
        <div class="col-md-4">
            <!-- Contact Person Last Name Field -->
            {!! Form::text('contact_person_last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
        </div>
    </div>
    <div class="row row-spacer-top-bot">
        <div class="col-md-4">
            <!-- Contact Person Email Field -->
            {!! Form::email('contact_person_email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        <div class="col-md-4">
            <!-- Contact Person Phone Field -->
            {!! Form::text('contact_person_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
        </div>
        <div class="col-md-2">
            <!-- Contact Person Phone Ext Field -->
            {!! Form::text('contact_person_phone_ext', null, ['class' => 'form-control', 'placeholder' => 'Ext']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Linked Casino & Restaurants</h3>
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
    <div class="row row-spacer-top-bot">
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="row">
                    <h5>Linked Casinos</h5>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes">
                <div class="row">
                    @foreach($casinos as $casino)
                        <div class="col-md-12">
                            <label id="casino{!! $casino->id !!}" class="checkbox-inline">
                                {!! Form::hidden('casino[]', false) !!}
                                {!! Form::checkbox('casino[]', $casino->id, $casino->id_exists) !!} {!! $casino->casino_trade_name !!}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h5 class="bot-heading">Link Another Casino</h5>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="row">
                    <h5>Linked Restaurants</h5>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes">

            </diV>
            <div class="col-md-12">
                <div class="row">
                    <h5 class="bot-heading">Link Another Restaurant</h5>
                </div>
            </div>
        </div>
    </div>
</div>














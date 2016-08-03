<!-- http://stackoverflow.com/a/31440360 -->
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{{ $moduleTitle }}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-12">
                        <a href="{!! route('corporations.index') !!}" class="btn btn-default pull-left">Discard</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
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
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Corporation Name Field -->
            {!! Form::text('corporation_name', null, ['class' => 'form-control', 'placeholder' => 'Corporation Name']) !!}
        </div>
        <div class="col-md-8 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
            <!-- Status Field -->
            {!! Form::hidden('status', false) !!}
            {!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
            <label for="is-active" class="checkbox-inline">
                is Active?
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 row-spacer-top-bot">
            <!-- Corporation Address1 Field -->
            {!! Form::text('corporation_address1', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
        </div>
        <div class="col-md-6 row-spacer-top-bot">
            <!-- Corporation Address2 Field -->
            {!! Form::text('corporation_address2', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation City Field -->
            {!! Form::text('corporation_city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation State Field -->
            {!! Form::select('corporation_state', Config::get('constants.state_en'), null, ['class' => 'select-form-control']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation Zipcode Field -->
            {!! Form::text('corporation_zipcode', null, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation Phone Field -->
            {!! Form::text('corporation_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No.']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
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
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Title Field -->
            {!! Form::text('contact_person_title', null, ['class' => 'form-control', 'placeholder' => 'Job Title']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person First Name Field -->
            {!! Form::text('contact_person_first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Last Name Field -->
            {!! Form::text('contact_person_last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Email Field -->
            {!! Form::email('contact_person_email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Contact Person Phone Field -->
            {!! Form::text('contact_person_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
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
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <div class="col-md-12">
                <div class="row">
                    <h5>Linked Casinos</h5>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes-bg">
                <div class="row link-to-checkboxes custom-scrollbar">
                    @foreach($casinos as $casino)
                        <div class="col-md-12 checkbox checkbox-warning">
                            {!! Form::hidden('casino['.$casino->custom_index.']', false) !!}
                            {!! Form::checkbox('casino['.$casino->custom_index.']', $casino->id, $casino->id_exists, ['id' => 'is-active'.$casino->id, 'onclick' => 'return showRestaurant(".restaurant-list'.$casino->id.'");']) !!}
                            <label for="is-active{!! $casino->id !!}" id="casino{!! $casino->id !!}" class="checkbox-inline">
                                {!! $casino->casino_trade_name !!}
                            </label>
                        </div>
                        <div class="hide">
                        @foreach($casino->restaurantLinks as $links)
                            <div class="col-md-12 checkbox checkbox-warning restaurant-list{!! $casino->id !!}">
                                {!! Form::checkbox($links->id, $links->id, 1, ['id' => 'restaurant'.$links->id, 'disabled']) !!}
                                <label for="restaurant{!! $links->id !!}" class="checkbox-inline">
                                    {!! $links->restaurant->restaurant_name; !!}
                                </label>
                            </div>
                        @endforeach
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <div class="col-md-12">
                <div class="row">
                    <h5>Linked Restaurants</h5>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes-bg">
                <div id="linked-restaurants" class="row link-to-checkboxes custom-scrollbar">

                </div>
            </div>
        </div>
    </div>
</div>







@section('scripts')
    <script type="text/javascript">
    function showRestaurant(checbox) 
    {
        $("#linked-restaurants").html('');
        if($(checbox).length) {
            $(checbox).each(function(i){
                $(this).clone().appendTo("#linked-restaurants");
                //$("#linked-restaurants").append($(this));
            });
        }
    }
    </script>
@endsection







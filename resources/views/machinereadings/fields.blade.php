<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('machinereadings.index') !!}" class="btn btn-default pull-right">Discard</a>
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
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
		<div class="col-md-4 row-spacer-top-bot">
            <!-- Restaurant Name Field -->
            <input id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Machine Name Field -->
            <input id="autocomplete-machine" class="form-control" placeholder="Machine Name" type="text">
            {!! Form::hidden('machine_id', null, ['id' => 'machine_id']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Temperature Reading Field -->
			{!! Form::text('temperature_reading', null, ['id'=>'temperature_reading', 'class' => 'form-control', 'placeholder' => 'Temperature Reading']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Reading Date/Time Field -->
			{!! Form::text('reading_date_time2', null, ['id'=>'reading_date_time', 'class' => 'form-control', 'placeholder' => 'Reading Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

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
            {!! Form::text('restaurant_id', null, ['id'=>'restaurant_id', 'class' => 'form-control', 'placeholder' => 'Restaurant Name']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Machine Name Field -->
            {!! Form::text('machine_id', null, ['id'=>'machine_id', 'class' => 'form-control', 'placeholder' => 'Machine Name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Temperature Reading Field -->
			{!! Form::text('temperature_reading', null, ['id'=>'temperature_reading', 'class' => 'form-control', 'placeholder' => 'Temperature Reading']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Reading Date/Time Field -->
			{!! Form::text('reading_date_time', null, ['id'=>'reading_date_time', 'class' => 'form-control', 'placeholder' => 'Reading Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
       $('#machine_id').autocomplete({
            source: "get-machine-autocomp",
            minLength: 1,
            select:function(e,ui){
                $('#machine_id').val(ui.item.value);
            }
        });
    });	
</script>
@endsection

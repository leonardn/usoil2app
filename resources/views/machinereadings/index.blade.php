@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>MACHINE READING SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Machine Reading Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/machinereadings" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
		<div class="col-md-3 row-spacer-top-bot">
            <!-- Restaurant Name Field -->
            {!! Form::text('restaurant_id', null, ['id' => 'restaurant_id', 'class' => 'form-control', 'placeholder' => 'Restaurant Name']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Machine Name Field -->
            {!! Form::text('machine_id', null, ['id' => 'machine_id', 'class' => 'form-control', 'placeholder' => 'Machine Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Temperature Reading Name -->
            {!! Form::text('temperature_reading', null, ['id' => 'temperature_reading', 'class' => 'form-control', 'placeholder' => 'Temperature Reading']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Reading Date/Time Field -->
            {!! Form::text('reading_date_time', null, ['id' => 'reading_date_time', 'class' => 'form-control', 'placeholder' => 'Reading Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-1 row-spacer-top-bot">
			<a href="#" class="btn btn-primary">Export</a>
		</div>
		<div class="col-md-2 row-spacer-top-bot">
			<a href="{!! route('machinereadings.create') !!}" class="btn btn-primary">Add New Machine Reading</a>
		</div>
	</div>
</div>

<div id="get-machinereadings">
@include('machinereadings.table')
</div>

        
@endsection


@section('scripts')
<script type="text/javascript">
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
   
    var restaurant_id = $("#restaurant_id").val();
    var machine_id = $("#machine_id").val();
    var temperature_reading = $("#temperature_reading").val();
    var reading_date_time = $("#reading_date_time").val();
    var urlRequest = 'machinereadings?search='+setDefault(restaurant_id, 'restaurant_id')+''+setDefault(machine_id, 'machine_id')+''+setDefault(temperature_reading, 'temperature_reading')+''+setDefault(reading_date_time, 'reading_date_time');

    //console.log(urlRequest.slice(0, -1));

    if(restaurant_id || machine_id || temperature_reading || reading_date_time)
    {
    }
    else
    {
        urlRequest = '/machinereadings;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-machinereadings").html(response);
            return false;
       }
       else 
       {
            return false;
       }
     }
   });
});

function setDefault(arg, field)
{
    return arg != '' ? field + ':'+arg+';' : '';
}
//https://github.com/andersao/l5-repository#enabling-in-your-repository
/*
 * Enable post ajax
 * $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': '{{ csrf_token() }}'
   }
 });*/
</script>
@endsection

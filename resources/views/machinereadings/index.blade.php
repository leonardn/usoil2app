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
            <input id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <input id="autocomplete-machine" class="form-control" placeholder="Machine Name" type="text">
            {!! Form::hidden('machine_id', null, ['id' => 'machine_id']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Temperature Reading Name -->
            {!! Form::text('temperature_reading', null, ['id' => 'temperature_reading', 'class' => 'form-control', 'placeholder' => 'Temperature Reading']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Reading Date/Time Field -->
            {!! Form::text('reading_date_time', null, ['id' => 'reading_date_time', 'class' => 'form-control', 'placeholder' => 'Reading Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-4 btn-spacer-top-bot">
			<a href="{!! url('/get-machinereading-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('machinereadings.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Machine Reading
            </a>
		</div>
	</div>
</div>
<div id="get-machinereadings">
	@include('machinereadings.table')
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content text-center">
            <div class="modal-header">
                <strong>Are you sure you want to delete this record?</strong>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary" data-dismiss="modal">&nbsp; &nbsp; &nbsp; No &nbsp; &nbsp; &nbsp;</button>
                <a href="#" id="submit" class="btn btn-default" id-to-delete="0">&nbsp; &nbsp; &nbsp; Yes &nbsp; &nbsp; &nbsp;</a>
            </div>
        </div>
    </div>
</div>
        
@endsection


@section('scripts')
<link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
<script type="text/javascript">
	var lastObj = "";
	
	$("#reading_date_time").datepicker({
			  dateFormat:'yy-mm-dd',
			});
			
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    lastObj = $(this);
    
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

$("#reading_date_time").change(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    lastObj = $(this);
   
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

//DELETE
$(".deleteBtn").click(function(){
	var id_to_delete = $(this).attr('id-to-delete');
	$("a#submit").attr('id-to-delete', id_to_delete);
});
$("a#submit").click(function(){
	var id_to_delete = $(this).attr('id-to-delete');
	$("#form-delete-"+id_to_delete).submit();
});

// AUTOCOMPLETE
$( "#autocomplete-machine" ).autocomplete({
	source: '/get-autocomplete-machines-options',
	minLength: 1,
	select: function(event, ui) {
		$(this).val(ui.item.value);
		$('#machine_id').val(ui.item.id);
		lastObj.keyup();
	}
});
$( "#autocomplete-restaurant" ).autocomplete({
	source: '/get-autocomplete-restaurants-options',
	minLength: 1,
	select: function(event, ui) {
		$(this).val(ui.item.value);
		$('#restaurant_id').val(ui.item.id);
		lastObj.keyup();
	}
});

    
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

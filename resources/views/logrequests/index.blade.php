@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>LOG REQUEST SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Log Request Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/logrequests" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
		<div class="col-md-3 row-spacer-top-bot">
            <!-- Fryer Name Field -->
            <input id="autocomplete-fryer" class="form-control" placeholder="Fryer Name" type="text">
            {!! Form::hidden('fryer_id', null, ['id' => 'fryer_id']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <input id="autocomplete-logoption" class="form-control" placeholder="Log Option" type="text">
            {!! Form::hidden('log_option_id', null, ['id' => 'log_option_id']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Creation Date/Time Field -->
            {!! Form::text('creation_date', null, ['id' => 'creation_date', 'class' => 'form-control', 'placeholder' => 'Creation Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-4 btn-spacer-top-bot">
			<a href="{!! url('/get-logrequest-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('logrequests.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Log Request
            </a>
		</div>
	</div>
</div>
<div id="get-logrequests">
	@include('logrequests.table')
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
	
	$("#creation_date").datepicker({
			  dateFormat:'yy-mm-dd',
			});
			
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    lastObj = $(this);
    
    var fryer_id = $("#fryer_id").val();
    var log_option_id = $("#log_option_id").val();
    var creation_date = $("#creation_date").val();
    var urlRequest = 'logrequests?search='+setDefault(fryer_id, 'fryer_id')+''+setDefault(log_option_id, 'log_option_id')+''+setDefault(creation_date, 'creation_date');

    //console.log(urlRequest.slice(0, -1));

    if(fryer_id || log_option_id || creation_date)
    {
    }
    else
    {
        urlRequest = '/logrequests;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-logrequests").html(response);
            return false;
       }
       else 
       {
            return false;
       }
     }
   });
});

$("#creation_date").change(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    lastObj = $(this);
   
    var fryer_id = $("#fryer_id").val();
    var log_option_id = $("#log_option_id").val();
    var creation_date = $("#creation_date").val();
    var urlRequest = 'logrequests?search='+setDefault(fryer_id, 'fryer_id')+''+setDefault(log_option_id, 'log_option_id')+''+setDefault(creation_date, 'creation_date');

    //console.log(urlRequest.slice(0, -1));

    if(fryer_id || log_option_id || creation_date)
    {
    }
    else
    {
        urlRequest = '/logrequests;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-logrequests").html(response);
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
$( "#autocomplete-fryer" ).autocomplete({
	source: '/get-autocomplete-fryers-options',
	minLength: 1,
	select: function(event, ui) {
		$(this).val(ui.item.value);
		$('#fryer_id').val(ui.item.id);
		lastObj.keyup();
	}
});
$( "#autocomplete-logoption" ).autocomplete({
	source: '/get-autocomplete-logoptions-options',
	minLength: 1,
	select: function(event, ui) {
		$(this).val(ui.item.value);
		$('#log_option_id').val(ui.item.id);
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

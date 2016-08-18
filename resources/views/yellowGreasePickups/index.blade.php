@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>YELLOW GREASE PICKUP SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Yellow Grease Pickup Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/yellowGreasePickups" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
     <div class="row">
     	<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
     		<input id="autocomplete-corporation" class="form-control" placeholder="" type="text">
			<label tabindex="-1">Corporation Name</label>
            {!! Form::hidden('corporation_id', null, ['id' => 'corporation_id']) !!}
		</div>
		<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
     		<input id="autocomplete-casino" class="form-control" placeholder="" type="text">
			<label tabindex="-1">Casino Name</label>
            {!! Form::hidden('casino_id', null, ['id' => 'casino_id']) !!}
		</div>
		<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            {!! Form::text('grease', null, ['id' => 'grease', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Grease</label>
        </div>
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            {!! Form::text('pickup_date', null, ['id' => 'pickup_date', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Pickup Date</label>
        </div>
	</div>
	<div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-yellow-grease-pickup-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('yellowGreasePickups.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-yellowGreasePickups">
	@include('yellowGreasePickups.table')
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
    <script type="text/javascript">
    $("#pickup_date").datepicker({
      dateFormat:'yy-mm-dd',
    });

    var lastObj = $("#corporation_id");
    $(".form-control").keyup(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
        lastObj = $(this);

		var corporation_id = $("#corporation_id").val();
		var casino_id = $("#casino_id").val();
		var grease = $("#grease").val();
		var pickup_date = $("#pickup_date").val();

        //AutoComplete
        var autocomplete_corporation = $("#autocomplete-corporation").val();
        var autocomplete_casino = $("#autocomplete-casino").val();
        if(autocomplete_corporation == "")
            corporation_id = "";
        if(autocomplete_casino == "")
            casino_id = "";

        var urlRequest = 'yellowGreasePickups?search='+setDefault(corporation_id, 'corporation_id')+''+setDefault(casino_id, 'casino_id')+''+setDefault(grease, 'grease')+''+setDefault(pickup_date, 'pickup_date');

        if(corporation_id ||
            casino_id ||
            grease ||
            pickup_date){
        } else {
            urlRequest = '/yellowGreasePickups;'
        }

        $.ajax({
           type: 'get',
           url: urlRequest.slice(0, -1),
           success: function (response) {
           if(response)   
           {
                $("#get-yellowGreasePickups").html(response);
                return false;
           }
           else 
           {
                return false;
           }
         }
       });
    });

    $("#pickup_date").change(function(){
        lastObj.keyup();
    });

    function setDefault(arg, field)
    {
        return arg != '' ? field + '%3A'+arg+';' : '';
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
    $( "#autocomplete-corporation" ).autocomplete({
		source: '/get-autocomplete-corporation-options',
		minLength: 1,
		select: function(event, ui) {
		  	$(this).val(ui.item.value);
		  	$('#corporation_id').val(ui.item.id);
		  	lastObj.keyup();
		}
	});
	$( "#autocomplete-casino" ).autocomplete({
		source: '/get-autocomplete-casino-options',
		minLength: 1,
		select: function(event, ui) {
		  	$(this).val(ui.item.value);
		  	$('#casino_id').val(ui.item.id);
		  	lastObj.keyup();
		}
	});
    </script>
@endsection

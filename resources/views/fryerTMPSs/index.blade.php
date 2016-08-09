@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>TMPS SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>TMPS Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/fryerTMPSs" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
     	<div class="col-md-2 row-spacer-top-bot">
            <input value="" id="autocomplete-fryer" class="form-control" placeholder="Fryer Name" type="text">
            {!! Form::hidden('fryer_id', null, ['id' => 'fryer_id', 'class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::text('measured_tpm', null, ['id' => 'measured_tpm', 'class' => 'form-control', 'placeholder' => 'Measured TPM']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::text('oil_temp', null, ['id' => 'oil_temp', 'class' => 'form-control', 'placeholder' => 'Oil Temp.']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
                {!! Form::hidden('changed_oil', false) !!}
                {!! Form::checkbox('changed_oil', '', null, ['id' => 'is-changed-oil', 'class' => 'styled']) !!}
		    <label for="is-changed-oil" class="checkbox-inline">
                Oil Changed?
		    </label>
     	</div>
     	<div class="col-md-2 row-spacer-top-bot checkbox checkbox-warning cb-padding-top" style="padding-top: 20px;">
                {!! Form::hidden('oil_moved', false) !!}
                {!! Form::checkbox('oil_moved', '', null, ['id' => 'is-oil-moved', 'class' => 'styled']) !!} 
		    <label for="is-oil-moved" class="checkbox-inline">
                Oil Moved?
		    </label>
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
            {!! Form::text('creation_date', null, ['id' => 'creation_date', 'class' => 'form-control', 'placeholder' => 'Creation Date']) !!}
     	</div>
     </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-fryerTMPS-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('fryerTMPSs.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-fryerTMPSs">
	@include('fryerTMPSs.table')
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

    var lastObj = "";
    $(".form-control").keyup(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
        lastObj = $(this);

        // var corporation_id = $("#corporation_id").val();
        // var casino_id = $("#casino_id").val();
        // var grease = $("#grease").val();
        // var pickup_date = $("#pickup_date").val();

        var fryer_id = $("#fryer_id").val();
        var measured_tpm = $("#measured_tpm").val();
        var oil_temp = $("#oil_temp").val();
        var is_changed_oil = $("#is-changed-oil").val();
        var is_oil_moved = $("#is-oil-moved").val();
        var creation_date = $("#creation_date").val();

        var urlRequest = 'fryerTMPSs?search='+setDefault(fryer_id, 'fryer_id')+''+setDefault(measured_tpm, 'measured_tpm')+''+setDefault(oil_temp, 'oil_temp')+''+setDefault(is_changed_oil, 'is_changed_oil')+''+setDefault(is_oil_moved, 'is_oil_moved')+''+setDefault(creation_date, 'creation_date');
        //console.log(urlRequest);

        if(fryer_id ||
            measured_tpm ||
            oil_temp ||
            is_changed_oil ||
            is_oil_moved ||
            creation_date){
        } else {
            urlRequest = '/fryerTMPSs;'
        }

        $.ajax({
           type: 'get',
           url: urlRequest.slice(0, -1),
           success: function (response) {
           if(response)   
           {
                $("#get-fryerTMPSs").html(response);
                return false;
           }
           else 
           {
                return false;
           }
         }
       });
    });
    $("#creation_date").change(function(){
        $(".form-control").keyup();
    });
    $('#is-oil-moved, #is-changed-oil').click(function(){
        if( $(this).is(':checked') )
            $(this).val('1');
        else
            $(this).val('0');
        $(".form-control").keyup();
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
        source: '/get-autocomplete-fryer-options',
        minLength: 1,
        select: function(event, ui) {
            $(this).val(ui.item.value);
            $('#fryer_id').val(ui.item.id);
            $(".form-control").keyup();
        }
    });
    $("#creation_date").datepicker({
      dateFormat:'yy-mm-dd',
    });
    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>TRASH BIN SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Trash Bin Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/trashBins" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
     	<div class="col-md-3 row-spacer-top-bot">
     		<input value="" id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id', 'class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-3 row-spacer-top-bot">
     		{!! Form::select('log_option_id', $logoptions, null, ['id' => 'log_option_id', 'class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-3 row-spacer-top-bot">
     		{!! Form::text('trash_weight', null, ['id' => 'trash_weight', 'class' => 'form-control', 'placeholder' => 'Trash Weight']) !!}
     	</div>
     	<div class="col-md-3 row-spacer-top-bot">
            {!! Form::text('creation_date', null, ['id' => 'creation_date', 'class' => 'form-control', 'placeholder' => 'Creation Date']) !!}
     	</div>
     </div>
    <div class="col-md-12 line-break"></div>
</div>

        
<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-trash-bin-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('trashBins.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-trashBins">
	@include('trashBins.table')
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
    var lastObj = $('#restaurant_id'); //SetDefault

    $(".form-control").keyup(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
        lastObj = $(this);

        var restaurant_id = $('#restaurant_id').val();
		var log_option_id = $('#log_option_id').val();
		var trash_weight = $('#trash_weight').val();
		var creation_date = $('#creation_date').val();

        var autocomplete_restaurant = $('#autocomplete-restaurant').val();
        if(autocomplete_restaurant == "")
            restaurant_id = "";

        var urlRequest = 'trashBins?search='+setDefault(restaurant_id, 'restaurant_id')+''+setDefault(log_option_id, 'log_option_id')+''+setDefault(trash_weight, 'trash_weight')+''+setDefault(creation_date, 'creation_date');
        //console.log(urlRequest);

        if(restaurant_id ||
            log_option_id ||
            trash_weight ||
            creation_date){
        } else {
            urlRequest = '/trashBins;'
        }

        $.ajax({
           type: 'get',
           url: urlRequest.slice(0, -1),
           success: function (response) {
           if(response)   
           {
                $("#get-trashBins").html(response);
                return false;
           }
           else 
           {
                return false;
           }
         }
       });
    });
    $("#creation_date, #log_option_id").change(function(){
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
   $( "#autocomplete-restaurant" ).autocomplete({
        source: '/get-autocomplete-restaurants-options',
        minLength: 1,
        select: function(event, ui) {
            $(this).val(ui.item.value);
            $('#restaurant_id').val(ui.item.id);
            lastObj.keyup();
        }
    });

    $("#creation_date").datepicker({
      dateFormat:'yy-mm-dd',
    });
    </script>
@endsection

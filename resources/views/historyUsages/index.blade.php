@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>HISTORY USAGE SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>History Usage Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/historyUsages" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
    	<div class="col-md-3 row-spacer-top-bot">
    		<input class="form-control" placeholder="Corporation Name" type="text">
            {!! Form::hidden('corporation_id', null, ['id' => 'corporation_id', 'class' => 'form-control']) !!}
    	</div>
    	<div class="col-md-2 row-spacer-top-bot">
    		<input placeholder="Casino Name" class="form-control" type="text">
            {!! Form::hidden('casino_id', null, ['id' => 'casino_id', 'class' => 'form-control']) !!}
    	</div>
     	<div class="col-md-3 row-spacer-top-bot">
     		<input value="" id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id', 'class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::text('usage', null, ['id' => 'usage', 'class' => 'form-control', 'placeholder' => 'Usage']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::select('month', array('' => 'Select Month', 'January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'), null, ['id' => 'month', 'class' => 'form-control']) !!}
     	</div>
     </div>
    <div class="col-md-12 line-break"></div>
</div>

        
<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-history-usage-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('historyUsages.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-historyUsages">
	@include('historyUsages.table')
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
    	var lastObj = $('#corporation_id'); //setDefault
        
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
        $( "#autocomplete-restaurant" ).autocomplete({
            source: '/get-autocomplete-restaurants-options',
            minLength: 1,
            select: function(event, ui) {
                $(this).val(ui.item.value);
                $('#restaurant_id').val(ui.item.id);
                lastObj.keyup();
            }
        });
        $("#month").change(function(){
        	lastObj.keyup();
	    });

        $(".form-control").keyup(function( event ) {
	        if ( event.which == 13 ) {
	            event.preventDefault();
	        }

	        lastObj = $(this);

	        var corporation_id = $('#corporation_id').val();
			var casino_id = $('#casino_id').val();
			var restaurant_id = $('#restaurant_id').val();
			var usage = $('#usage').val();
			var month = $('#month').val();

	        var urlRequest = 'historyUsages?search='+setDefault(corporation_id, 'corporation_id')+''+setDefault(casino_id, 'casino_id')+''+setDefault(restaurant_id, 'restaurant_id')+''+setDefault(usage, 'usage')+''+setDefault(month, 'month');
	        //console.log(urlRequest);

	        if(corporation_id ||
	            casino_id ||
	            restaurant_id ||
	            usage ||
	            month){
	        } else {
	            urlRequest = '/historyUsages;'
	        }

	        $.ajax({
	           type: 'get',
	           url: urlRequest.slice(0, -1),
	           success: function (response) {
		           if(response)   
		           {
		                $("#get-historyUsages").html(response);
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
    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>FRYERS SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Fryers Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/fryers" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
     <div class="row">
     	<div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('fryer_name', null, ['id' => 'fryer_name', 'class' => 'form-control', 'placeholder' => 'Fryer Name']) !!}
	     </div>
	     <div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('oil_capacity', null, ['id' => 'oil_capacity', 'class' => 'form-control', 'placeholder' => 'Oil Capacity']) !!}
	     </div>
	     <div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('benchmark', null, ['id' => 'benchmark', 'class' => 'form-control', 'placeholder' => 'Benchmark']) !!}
	     </div>
	     <div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('make', null, ['id' => 'make', 'class' => 'form-control', 'placeholder' => 'Make']) !!}
	     </div>
	     <div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('model', null, ['id' => 'model', 'class' => 'form-control', 'placeholder' => 'Model']) !!}
	     </div>
	     <div class="col-md-2 row-spacer-top-bot">
	     	{!! Form::text('serial_number', null, ['id' => 'serial_number', 'class' => 'form-control', 'placeholder' => 'Serial Number']) !!}
	     </div>
     </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-fryer-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('fryers.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Fryers
            </a>
		</div>
	</div>
</div>

<div id="get-fryers">
	@include('fryers.table')
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
    $(".form-control").keyup(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
     //    var restaurant_name = $("#restaurant_name").val();
    	// var contact_person_phone = $("#contact_person_phone").val();
    	// var contact_person_first_name = $("#contact_person_first_name").val();
    	// var contact_person_email = $("#contact_person_email").val();
    	// var restaurant_location = $("#restaurant_location").val();
    	// var restaurant_location_code = $("#restaurant_location_code").val();

    	var fryer_name = $("#fryer_name").val();
		var oil_capacity = $("#oil_capacity").val();
		var benchmark = $("#benchmark").val();
		var make = $("#make").val();
		var model = $("#model").val();
		var serial_number = $("#serial_number").val();

        var urlRequest = 'fryers?search='+setDefault(fryer_name, 'fryer_name')+''+setDefault(oil_capacity, 'oil_capacity')+''+setDefault(benchmark, 'benchmark')+''+setDefault(make, 'make')+''+setDefault(model, 'model')+''+setDefault(serial_number, 'serial_number');

        if(fryer_name ||
            oil_capacity ||
            benchmark ||
            make ||
            model ||
            serial_number){
        } else {
            urlRequest = '/fryers;'
        }

        $.ajax({
           type: 'get',
           url: urlRequest.slice(0, -1),
           success: function (response) {
           if(response)   
           {
                $("#get-fryers").html(response);
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

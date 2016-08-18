@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>LOG OPTION SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Log Options Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/logoptions" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Log Option Name Field -->
            {!! Form::text('option_title', null, ['id' => 'option_title', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Log Option Title</label>
        </div>
        <div class="col-md-2 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Log Option Type Field -->
            {!! Form::select('option_type', Config::get('constants.option_type'), null, ['id' => 'option_type', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-4 btn-spacer-top-bot">
			<a href="{!! url('/get-logoption-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('logoptions.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Log Option
            </a>
		</div>
	</div>
</div>
<div id="get-logoption">
	@include('logoptions.table')
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
	   
		var option_title = $("#option_title").val();
		var option_type = $("#option_type").val();
		var urlRequest = 'logoptions?search='+setDefault(option_title, 'option_title')+''+setDefault(option_type, 'option_type');

		//console.log(urlRequest.slice(0, -1));

		if(option_title || option_type)
		{
		}
		else
		{
			urlRequest = '/logoptions;'
		}

		$.ajax({
		   type: 'get',
		   url: urlRequest.slice(0, -1),
		   success: function (response) {
		   if(response)   
		   {
				$("#get-logoption").html(response);
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
 
	$(".select-form-control").change(function() {
	  
		var option_title = $("#option_title").val();
		var option_type = $("#option_type").val();
		var urlRequest = 'logoptions?search='+setDefault(option_title, 'option_title')+''+setDefault(option_type, 'option_type');

		//console.log(urlRequest.slice(0, -1));

		if(option_title || option_type)
		{
		}
		else
		{
			urlRequest = '/logoptions;'
		}

		$.ajax({
		   type: 'get',
		   url: urlRequest.slice(0, -1),
		   success: function (response) {
		   if(response)   
		   {
				$("#get-logoption").html(response);
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

@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>CLIENT LOGIN SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Client Login Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/clientLogins" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
     	<div class="col-md-4 row-spacer-top-bot">
            <!-- Email Field -->
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Password Field -->
            {!! Form::text('password', null, ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) !!}
        </div>
     </div>
     <div class="col-md-12 line-break"></div>
 </div>

 <div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('#') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('clientLogins.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-clientLogins">
	@include('clientLogins.table')
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

	        var email = $("#email").val();
	        var password = $("#password").val();

	        var urlRequest = 'clientLogins?search='+setDefault(email, 'email')+''+setDefault(password, 'password');
	        //console.log(urlRequest);

	        if(email ||
	            password){
	        } else {
	            urlRequest = '/clientLogins;'
	        }

	        $.ajax({
	           type: 'get',
	           url: urlRequest.slice(0, -1),
	           success: function (response) {
	           if(response)   
	           {
	                $("#get-clientLogins").html(response);
	                return false;
	           }
	           else 
	           {
	                return false;
	           }
	         }
	       });
	    });

		 //DELETE
	    $(".deleteBtn").click(function(){
	        var id_to_delete = $(this).attr('id-to-delete');
	        $("a#submit").attr('id-to-delete', id_to_delete);
	    });
	    $("a#submit").click(function(){
	        var id_to_delete = $(this).attr('id-to-delete');
	        $("#form-delete-"+id_to_delete).submit();
	    });

	    // SET DEFAULT
	    function setDefault(arg, field)
	    {
	        return arg != '' ? field + ':'+arg+';' : '';
	    }
	</script>
@endsection

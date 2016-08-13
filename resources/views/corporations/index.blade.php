@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>CORPORATION SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Corporation Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/corporations" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation Name Field -->
            {!! Form::text('corporation_name', null, ['id' => 'corporation_name', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Corporation Name</label>
        </div>
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation Phone Field -->
            {!! Form::text('corporation_phone', null, ['id' => 'corporation_phone', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Phone No.</label>
        </div>
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Contact Person First Name Field -->
            {!! Form::text('contact_person_first_name', null, ['id' => 'contact_person_first_name', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Contact Person Name</label>
        </div>
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Contact Person Email Field -->
            {!! Form::email('contact_person_email', null, ['id' => 'contact_person_email', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Email</label>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation Address1 Field -->
            {!! Form::text('corporation_address1', null, ['id' => 'corporation_address1', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Address 1</label>
        </div>
        <div class="col-md-2 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation City Field -->
            {!! Form::text('corporation_city', null, ['id' => 'corporation_city', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>City</label>
        </div>
        <div class="col-md-2 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation State Field -->
            {!! Form::text('corporation_state', null, ['id' => 'corporation_state', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>State</label>
        </div>
        <div class="col-md-2 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Corporation Zipcode Field -->
            {!! Form::text('corporation_zipcode', null, ['id' => 'corporation_zipcode', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label>Zip Code</label>
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('/get-corporation-export') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
            <a href="{!! route('corporations.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Corp
            </a>
		</div>
	</div>
</div>

<div id="get-corporation">
@include('corporations.table')
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
        //console.log(setDefault($("#corporation_name").val(), 'no-value'));

        var corporation_name = $("#corporation_name").val();
        var corporation_phone = $("#corporation_phone").val();
        var contact_person_first_name = $("#contact_person_first_name").val();
        var contact_person_email = $("#contact_person_email").val();
        var corporation_address1 = $("#corporation_address1").val();
        var corporation_city = $("#corporation_city").val();
        var corporation_state = $("#corporation_state").val();
        var corporation_zipcode = $("#corporation_zipcode").val();

        var urlRequest = 'corporations?search='+setDefault(corporation_name, 'corporation_name')+''+setDefault(corporation_phone, 'corporation_phone')+''+setDefault(contact_person_first_name, 'contact_person_first_name')+''+setDefault(contact_person_email, 'contact_person_email')+''+setDefault(corporation_address1, 'corporation_address1')+''+setDefault(corporation_city, 'corporation_city')+''+setDefault(corporation_state, 'corporation_state')+''+setDefault(corporation_zipcode, 'corporation_zipcode');

        console.log(urlRequest.slice(0, -1));

        if(corporation_name ||
            corporation_phone ||
            contact_person_first_name ||
            contact_person_email ||
            corporation_address1 ||
            corporation_city ||
            corporation_state ||
            corporation_zipcode){
        } else {
            urlRequest = '/corporations;'
        }

        $.ajax({
           type: 'get',
           url: urlRequest.slice(0, -1),
           success: function (response) {
           if(response)   
           {
                $("#get-corporation").html(response);
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

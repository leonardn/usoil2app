@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>CASINOS SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Casinos Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/casinos" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
        	<!-- Casino Trade Name Field -->
            {!! Form::text('casino_trade_name', null, ['id' => 'casino_trade_name', 'class' => 'form-control', 'placeholder' => 'Casino Trade Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
        	<!-- Casino Phone Field -->
    		{!! Form::text('casino_phone', null, ['id' => 'casino_phone', 'class' => 'form-control', 'placeholder' => 'Phone']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
        	<!-- Contact Person First Name Field -->
    		{!! Form::text('contact_person_first_name', null, ['id' => 'contact_person_first_name', 'class' => 'form-control', 'placeholder' => 'Contact Person Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
        	<!-- Contact Person Email Field -->
    		{!! Form::text('contact_person_email', null, ['id' => 'contact_person_email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6 row-spacer-top-bot">
    		<!-- Casino Address1 Field -->
    		{!! Form::text('casino_address1', null, ['id' => 'casino_address1', 'class' => 'form-control', 'placeholder' => 'Address']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
        	<!-- Casino City Field -->
    		{!! Form::text('casino_city', null, ['id' => 'casino_city', 'class' => 'form-control', 'placeholder' => 'City']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
        	<!-- Casino State Field -->
    		{!! Form::text('casino_state', null, ['id' => 'casino_state', 'class' => 'form-control', 'placeholder' => 'State']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Casino Zipcode Field -->
    		{!! Form::text('casino_zipcode', null, ['id' => 'casino_zipcode', 'class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="#" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('casinos.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New Casino
            </a>
		</div>
	</div>
</div>
<div id="get-casino">
	@include('casinos.table')
</div>
        
@endsection

@section('scripts')
<script type="text/javascript">
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    //console.log(setDefault($("#corporation_name").val(), 'no-value'));
    var casino_trade_name = $("#casino_trade_name").val();
	var casino_phone = $("#casino_phone").val();
	var contact_person_first_name = $("#contact_person_first_name").val();
	var contact_person_email = $("#contact_person_email").val();
	var casino_address1 = $("#casino_address1").val();
	var casino_city = $("#casino_city").val();
	var casino_state = $("#casino_state").val();
	var casino_zipcode = $("#casino_zipcode").val();

    var urlRequest = 'casinos?search='+setDefault(casino_trade_name, 'casino_trade_name')+''+setDefault(casino_phone, 'casino_phone')+''+setDefault(contact_person_first_name, 'contact_person_first_name')+''+setDefault(contact_person_email, 'contact_person_email')+''+setDefault(casino_address1, 'casino_address1')+''+setDefault(casino_city, 'casino_city')+''+setDefault(casino_state, 'casino_state')+''+setDefault(casino_zipcode, 'casino_zipcode');

    //console.log(urlRequest.slice(0, -1));

    if(casino_trade_name ||
        casino_phone ||
        contact_person_first_name ||
        contact_person_email ||
        casino_address1 ||
        casino_city ||
        casino_state ||
        casino_zipcode){
    } else {
        urlRequest = '/casinos;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-casino").html(response);
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
</script>
@endsection

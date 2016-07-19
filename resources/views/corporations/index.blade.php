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
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation Name Field -->
            {!! Form::text('corporation_name', null, ['id' => 'corporation_name', 'class' => 'form-control', 'placeholder' => 'Corporation Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Corporation Phone Field -->
            {!! Form::text('corporation_phone', null, ['id' => 'corporation_phone', 'class' => 'form-control', 'placeholder' => 'Phone No.']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Contact Person First Name Field -->
            {!! Form::text('contact_person_first_name', null, ['id' => 'contact_person_first_name', 'class' => 'form-control', 'placeholder' => 'Contact Person Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Contact Person Email Field -->
            {!! Form::email('contact_person_email', null, ['id' => 'contact_person_email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6 row-spacer-top-bot">
            <!-- Corporation Address1 Field -->
            {!! Form::text('corporation_address1', null, ['id' => 'corporation_address1', 'class' => 'form-control', 'placeholder' => 'Address 1']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Corporation City Field -->
            {!! Form::text('corporation_city', null, ['id' => 'corporation_city', 'class' => 'form-control', 'placeholder' => 'City']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Corporation State Field -->
            {!! Form::text('corporation_state', null, ['id' => 'corporation_state', 'class' => 'form-control', 'placeholder' => 'State']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Corporation Zipcode Field -->
            {!! Form::text('corporation_zipcode', null, ['id' => 'corporation_zipcode', 'class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-1 row-spacer-top-bot">
			<a href="#" class="btn btn-primary">Export</a>
		</div>
		<div class="col-md-2 row-spacer-top-bot">
			<a href="{!! route('corporations.create') !!}" class="btn btn-primary">Add New Corp</a>
		</div>
	</div>
</div>

<div id="get-corporation">
@include('corporations.table')
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

    //console.log(urlRequest.slice(0, -1));

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
</script>
@endsection

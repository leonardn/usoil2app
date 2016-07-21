@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>RESTAURANTS SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Restaurants Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/restaurants" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            {!! Form::text('restaurant_name', null, ['id' => 'restaurant_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
    		{!! Form::text('contact_person_phone', null, ['id' => 'contact_person_phone', 'class' => 'form-control', 'placeholder' => 'Phone']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
    		{!! Form::text('contact_person_first_name', null, ['id' => 'contact_person_first_name', 'class' => 'form-control', 'placeholder' => 'Contact Person Name']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
    		{!! Form::text('contact_person_email', null, ['id' => 'contact_person_email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6 row-spacer-top-bot">
    		{!! Form::text('restaurant_location', null, ['id' => 'restaurant_location', 'class' => 'form-control', 'placeholder' => 'Location']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
    		{!! Form::text('restaurant_location_code', null, ['id' => 'restaurant_location_code', 'class' => 'form-control', 'placeholder' => 'Location Code']) !!}
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
			<a href="{!! route('restaurants.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>
<div id="get-restaurants">
	@include('restaurants.table')
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
    var restaurant_name = $("#restaurant_name").val();
	var contact_person_phone = $("#contact_person_phone").val();
	var contact_person_first_name = $("#contact_person_first_name").val();
	var contact_person_email = $("#contact_person_email").val();
	var restaurant_location = $("#restaurant_location").val();
	var restaurant_location_code = $("#restaurant_location_code").val();

    var urlRequest = 'restaurants?search='+setDefault(restaurant_name, 'restaurant_name')+''+setDefault(contact_person_phone, 'contact_person_phone')+''+setDefault(contact_person_first_name, 'contact_person_first_name')+''+setDefault(contact_person_email, 'contact_person_email')+''+setDefault(restaurant_location, 'restaurant_location')+''+setDefault(restaurant_location_code, 'restaurant_location_code');

    if(restaurant_name ||
        contact_person_phone ||
        contact_person_first_name ||
        contact_person_email ||
        restaurant_location ||
        restaurant_location_code){
    } else {
        urlRequest = '/restaurants;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-restaurants").html(response);
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

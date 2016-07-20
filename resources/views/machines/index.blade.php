@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>MACHINE SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>Machine Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/machines" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Machine Name Field -->
            {!! Form::text('machine_name', null, ['id' => 'machine_name', 'class' => 'form-control', 'placeholder' => 'Machine Name']) !!}
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <!-- Machine Type Field -->
            {!! Form::text('machine_type', null, ['id' => 'machine_type', 'class' => 'form-control', 'placeholder' => 'Machine Type']) !!}
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
			<a href="{!! route('machines.create') !!}" class="btn btn-primary">Add New Machine</a>
		</div>
	</div>
</div>

<div id="get-machine">
@include('machines.table')
</div>

        
@endsection


@section('scripts')
<script type="text/javascript">
$(".form-control").keyup(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
    }
   
    var machine_name = $("#machine_name").val();
    var machine_type = $("#machine_type").val();
    var urlRequest = 'machines?search='+setDefault(machine_name, 'machine_name')+''+setDefault(machine_type, 'machine_type');

    //console.log(urlRequest.slice(0, -1));

    if(machine_name || machine_type)
    {
    }
    else
    {
        urlRequest = '/machines;'
    }

    $.ajax({
       type: 'get',
       url: urlRequest.slice(0, -1),
       success: function (response) {
       if(response)   
       {
            $("#get-machine").html(response);
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
=======
        <h1 class="pull-left">Machines</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('machines.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('machines.table')
        
>>>>>>> 1f6119bd87453c2dfaede669f7bf0f3935315463
@endsection

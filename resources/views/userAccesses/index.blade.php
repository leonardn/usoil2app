@extends('layouts.app')

@section('content')
    
	<div class="col-md-12">
	    <div class="col-md-12 top-heading">
	        <div class="row">
	            <h4>USER ACCESS</h4>
	        </div>
	    </div>
	</div>
	

    {{-- <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('userAccesses.create') !!}">Add New</a> --}}

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('userAccesses.table')

@endsection

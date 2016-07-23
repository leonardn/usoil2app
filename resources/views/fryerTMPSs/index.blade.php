@extends('layouts.app')

@section('content')
        <h1 class="pull-left">FryerTMPSs</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('fryerTMPSs.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('fryerTMPSs.table')
        
        @include('core-templates::common.paginate', ['records' => $fryerTMPSs])

@endsection

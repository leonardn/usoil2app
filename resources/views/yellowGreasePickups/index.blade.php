@extends('layouts.app')

@section('content')
        <h1 class="pull-left">YellowGreasePickups</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('yellowGreasePickups.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('yellowGreasePickups.table')
        
        @include('core-templates::common.paginate', ['records' => $yellowGreasePickups])

@endsection

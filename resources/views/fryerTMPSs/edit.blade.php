@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit FryerTMPS</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($fryerTMPS, ['route' => ['fryerTMPSs.update', $fryerTMPS->id], 'method' => 'patch']) !!}

            @include('fryerTMPSs.fields')

            {!! Form::close() !!}
        </div>
@endsection

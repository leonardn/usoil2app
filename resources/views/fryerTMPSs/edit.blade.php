@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($fryerTMPS, ['route' => ['fryerTMPSs.update', $fryerTMPS->id], 'method' => 'patch']) !!}

            @include('fryerTMPSs.fields', ['moduleTitle' => 'EDIT FRYER TMPS'])

            {!! Form::close() !!}
        </div>
@endsection

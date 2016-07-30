@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'fryerTMPSs.store']) !!}

            @include('fryerTMPSs.fields', ['moduleTitle' => 'ADD NEW FRYER TMPS'])

        {!! Form::close() !!}
    </div>
@endsection



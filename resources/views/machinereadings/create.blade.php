@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'machinereadings.store']) !!}

            @include('machinereadings.fields', ['moduleTitle' => 'ADD NEW MACHINE READING'])

        {!! Form::close() !!}
    </div>
@endsection

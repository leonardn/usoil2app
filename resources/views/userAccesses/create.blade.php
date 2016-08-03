@extends('layouts.app')

@section('content')

    <div class="row">
        {!! Form::open(['route' => 'userAccesses.store']) !!}

            @include('userAccesses.fields', ['moduleTitle' => 'ASSIGN USER ACCESS'])

        {!! Form::close() !!}
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'fryers.store']) !!}

            @include('fryers.fields', ['moduleTitle' => 'ADD NEW FRYER'])

        {!! Form::close() !!}
    </div>
@endsection

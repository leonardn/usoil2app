@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'logoptions.store']) !!}

            @include('logoptions.fields', ['moduleTitle' => 'ADD NEW LOG OPTION'])

        {!! Form::close() !!}
    </div>
@endsection

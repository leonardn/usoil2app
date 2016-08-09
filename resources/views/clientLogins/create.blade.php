@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'clientLogins.store']) !!}

            @include('clientLogins.fields', ['moduleTitle' => 'ADD NEW CLIENT LOGIN'])

        {!! Form::close() !!}
    </div>
@endsection

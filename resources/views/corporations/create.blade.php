@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'corporations.store']) !!}

            @include('corporations.fields', ['moduleTitle' => 'ADD NEW CORPORATION'])

        {!! Form::close() !!}
    </div>
@endsection

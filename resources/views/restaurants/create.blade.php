@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'restaurants.store']) !!}

            @include('restaurants.fields', ['moduleTitle' => 'ADD NEW RESTAURANT'])

        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($restaurant, ['route' => ['restaurants.update', $restaurant->id], 'method' => 'patch']) !!}

        @include('restaurants.fields', ['moduleTitle' => 'EDIT RESTAURANT'])

        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'casinos.store']) !!}

            @include('casinos.fields', ['moduleTitle' => 'ADD NEW CASINO'])

        {!! Form::close() !!}
    </div>
@endsection

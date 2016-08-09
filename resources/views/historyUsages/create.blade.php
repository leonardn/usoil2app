@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'historyUsages.store']) !!}

            @include('historyUsages.fields', ['moduleTitle' => 'ADD NEW HISTORY USAGE'])

        {!! Form::close() !!}
    </div>
@endsection

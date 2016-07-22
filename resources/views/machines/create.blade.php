@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'machines.store']) !!}

            @include('machines.fields', ['moduleTitle' => 'ADD NEW MACHINE'])

        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'trashBins.store']) !!}

            @include('trashBins.fields', ['moduleTitle' => 'ADD NEW TRASH BINS'])

        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($corporation, ['route' => ['corporations.update', $corporation->id], 'method' => 'patch']) !!}

        @include('corporations.fields', ['moduleTitle' => 'EDIT CORPORATION'])

        {!! Form::close() !!}
    </div>
@endsection
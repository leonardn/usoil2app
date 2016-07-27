@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($logoption, ['route' => ['logoptions.update', $logoption->id], 'method' => 'patch']) !!}

        @include('logoptions.fields', ['moduleTitle' => 'EDIT LOG OPTION'])

        {!! Form::close() !!}
    </div>
@endsection

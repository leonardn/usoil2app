@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($casino, ['route' => ['casinos.update', $casino->id], 'method' => 'patch']) !!}

        @include('casinos.fields', ['moduleTitle' => 'EDIT CASINO'])

        {!! Form::close() !!}
    </div>
@endsection

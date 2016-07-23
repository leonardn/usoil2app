@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($fryer, ['route' => ['fryers.update', $fryer->id], 'method' => 'patch']) !!}

            @include('fryers.fields', ['moduleTitle' => 'EDIT FRYER'])

            {!! Form::close() !!}
        </div>
@endsection

@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($clientLogin, ['route' => ['clientLogins.update', $clientLogin->id], 'method' => 'patch']) !!}

            @include('clientLogins.fields', ['moduleTitle' => 'EDIT CLIENT LOGIN'])

            {!! Form::close() !!}
        </div>
@endsection

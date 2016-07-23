@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($yellowGreasePickup, ['route' => ['yellowGreasePickups.update', $yellowGreasePickup->id], 'method' => 'patch']) !!}

            @include('yellowGreasePickups.fields', ['moduleTitle' => 'EDIT YELLOW GREASE PICKUP'])

            {!! Form::close() !!}
        </div>
@endsection

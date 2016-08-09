@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($machine, ['route' => ['machines.update', $machine->id], 'method' => 'patch']) !!}

        @include('machines.fields', ['moduleTitle' => 'EDIT MACHINE'])

        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($machinereadings, ['route' => ['machinereadings.update', $machinereadings->id], 'method' => 'patch']) !!}

        @include('machinereadings.fields', ['moduleTitle' => 'EDIT MACHINE READING'])

        {!! Form::close() !!}
    </div>
@endsection

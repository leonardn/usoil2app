@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($historyUsage, ['route' => ['historyUsages.update', $historyUsage->id], 'method' => 'patch']) !!}

            @include('historyUsages.fields', ['moduleTitle' => 'EDIT HISTORY USAGE'])

            {!! Form::close() !!}
        </div>
@endsection

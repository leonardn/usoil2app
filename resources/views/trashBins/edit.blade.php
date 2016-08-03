@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($trashBin, ['route' => ['trashBins.update', $trashBin->id], 'method' => 'patch']) !!}

            @include('trashBins.fields', ['moduleTitle' => 'EDIT TRASH BINS'])

            {!! Form::close() !!}
        </div>
@endsection

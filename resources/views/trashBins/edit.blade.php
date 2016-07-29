@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TrashBin</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($trashBin, ['route' => ['trashBins.update', $trashBin->id], 'method' => 'patch']) !!}

            @include('trashBins.fields')

            {!! Form::close() !!}
        </div>
@endsection

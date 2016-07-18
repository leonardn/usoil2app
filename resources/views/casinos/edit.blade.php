@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Casino</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($casino, ['route' => ['casinos.update', $casino->id], 'method' => 'patch']) !!}

            @include('casinos.fields')

            {!! Form::close() !!}
        </div>
@endsection

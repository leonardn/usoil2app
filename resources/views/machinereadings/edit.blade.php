@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Machine Reading</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($machinereadings, ['route' => ['machinereadings.update', $machinereadings->id], 'method' => 'patch']) !!}

            @include('machinereadings.fields')

            {!! Form::close() !!}
        </div>
@endsection

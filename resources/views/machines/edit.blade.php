@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Machine</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($machine, ['route' => ['machines.update', $machine->id], 'method' => 'patch']) !!}

            @include('machines.fields')

            {!! Form::close() !!}
        </div>
@endsection

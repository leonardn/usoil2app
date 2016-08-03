@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit UserAccess</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($userAccess, ['route' => ['userAccesses.update', $userAccess->id], 'method' => 'patch']) !!}

            @include('userAccesses.fields')

            {!! Form::close() !!}
        </div>
@endsection

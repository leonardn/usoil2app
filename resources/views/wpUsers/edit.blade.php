@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit wp_users</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($wpUsers, ['route' => ['wpUsers.update', $wpUsers->id], 'method' => 'patch']) !!}

            @include('wpUsers.fields')

            {!! Form::close() !!}
        </div>
@endsection

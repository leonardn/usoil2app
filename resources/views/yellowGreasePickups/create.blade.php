@extends('layouts.app')
<!-- https://gist.github.com/imranismail/10200241 -->
<!-- https://api.jqueryui.com/1.8/autocomplete -->

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'yellowGreasePickups.store']) !!}

            @include('yellowGreasePickups.fields', ['moduleTitle' => 'ADD NEW YELLOW GREASE PICKUP'])

        {!! Form::close() !!}
    </div>
    
@endsection



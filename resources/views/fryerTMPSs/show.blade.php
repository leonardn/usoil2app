@extends('layouts.app')

@section('content')
    @include('fryerTMPSs.show_fields')

    <div class="form-group">
           <a href="{!! route('fryerTMPSs.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

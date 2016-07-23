@extends('layouts.app')

@section('content')
    @include('fryers.show_fields')

    <div class="form-group">
           <a href="{!! route('fryers.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

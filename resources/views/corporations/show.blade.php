@extends('layouts.app')

@section('content')
    @include('corporations.show_fields')

    <div class="form-group">
           <a href="{!! route('corporations.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @include('logoptions.show_fields')

    <div class="form-group">
           <a href="{!! route('logoptions.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

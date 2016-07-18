@extends('layouts.app')

@section('content')
    @include('casinos.show_fields')

    <div class="form-group">
           <a href="{!! route('casinos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

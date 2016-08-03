@extends('layouts.app')

@section('content')
    @include('userAccesses.show_fields')

    <div class="form-group">
           <a href="{!! route('userAccesses.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @include('machines.show_fields')

    <div class="form-group">
           <a href="{!! route('machines.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @include('yellowGreasePickups.show_fields')

    <div class="form-group">
           <a href="{!! route('yellowGreasePickups.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

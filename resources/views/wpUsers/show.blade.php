@extends('layouts.app')

@section('content')
    @include('wpUsers.show_fields')

    <div class="form-group">
           <a href="{!! route('wpUsers.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

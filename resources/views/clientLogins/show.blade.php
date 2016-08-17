@extends('layouts.app')

@section('content')
    @include('clientLogins.show_fields')

    <div class="form-group">
           <a href="{!! route('clientLogins.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

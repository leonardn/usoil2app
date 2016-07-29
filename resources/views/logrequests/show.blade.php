@extends('layouts.app')

@section('content')
    @include('logrequests.show_fields')

    <div class="form-group">
           <a href="{!! route('logrequests.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

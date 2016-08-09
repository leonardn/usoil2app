@extends('layouts.app')

@section('content')
    @include('historyUsages.show_fields')

    <div class="form-group">
           <a href="{!! route('historyUsages.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

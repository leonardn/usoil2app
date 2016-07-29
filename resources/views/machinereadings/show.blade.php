@extends('layouts.app')

@section('content')
    @include('machinereadings.show_fields')

    <div class="form-group">
           <a href="{!! route('machinereadings.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

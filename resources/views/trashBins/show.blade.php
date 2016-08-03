@extends('layouts.app')

@section('content')
    @include('trashBins.show_fields')

    <div class="form-group">
           <a href="{!! route('trashBins.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

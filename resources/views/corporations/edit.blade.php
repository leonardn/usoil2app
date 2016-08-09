@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::model($corporation, ['route' => ['corporations.update', $corporation->id], 'method' => 'patch']) !!}

        @include('corporations.fields', ['moduleTitle' => 'EDIT CORPORATION'])

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
	<script type="text/javascript">
	function showRestaurant(checbox) 
	{
		$("#linked-restaurants").html('');
		if($(checbox).length) {
			$(checbox).each(function(i){
				$(this).clone().appendTo("#linked-restaurants");
				//$("#linked-restaurants").append($(this));
			});
		}
	}
	</script>
@endsection

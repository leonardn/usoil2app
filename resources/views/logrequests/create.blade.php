@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'logrequests.store']) !!}

            @include('logrequests.fields', ['moduleTitle' => 'ADD NEW LOG REQUEST'])

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
	<link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>

	<script type="text/javascript">
		$( "#autocomplete-fryer" ).autocomplete({
			source: '/get-autocomplete-fryers-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#fryer_id').val(ui.item.id);
			}
		});
		$( "#autocomplete-logoption" ).autocomplete({
			source: '/get-autocomplete-logoptions-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#log_option_id').val(ui.item.id);
			}
		});
		
		$("#creation_date").datetimepicker({
			  format:'Y-m-d H:i:s',
			});
	</script>
@endsection

@extends('layouts.app')
<!-- https://gist.github.com/imranismail/10200241 -->
<!-- https://api.jqueryui.com/1.8/autocomplete -->

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'yellowGreasePickups.store']) !!}

            @include('yellowGreasePickups.fields', ['moduleTitle' => 'ADD NEW YELLOW GREASE PICKUP'])

        {!! Form::close() !!}
    </div>
    
@endsection

@section('scripts')
	<link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
	<script type="text/javascript">
		$( "#autocomplete-corporation" ).autocomplete({
			source: '/get-autocomplete-corporation-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#corporation_id').val(ui.item.id);
			}
		});
		$( "#autocomplete-casino" ).autocomplete({
			source: '/get-autocomplete-casino-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#casino_id').val(ui.item.id);
			}
		});
		$("#pickup_date").datetimepicker({
	      dateFormat:'Y-m-d H:i:s',
	    });
	</script>
@endsection

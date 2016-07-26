@extends('layouts.app')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'machinereadings.store']) !!}

            @include('machinereadings.fields', ['moduleTitle' => 'ADD NEW MACHINE READING'])

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
	<link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>

	<script type="text/javascript">
		$( "#autocomplete-machine" ).autocomplete({
			source: '/get-autocomplete-machines-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#machine_id').val(ui.item.id);
			}
		});
		$( "#autocomplete-restaurant" ).autocomplete({
			source: '/get-autocomplete-restaurants-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#restaurant_id').val(ui.item.id);
			}
		});
		
		$("#reading_date_time").datetimepicker({
			  format:'Y-m-d H:i:s',
			});
	</script>
@endsection

@extends('layouts.app')

@section('content')
        <div class="row">
            {!! Form::model($fryerTMPS, ['route' => ['fryerTMPSs.update', $fryerTMPS->id], 'method' => 'patch']) !!}

            @include('fryerTMPSs.fields', ['moduleTitle' => 'EDIT FRYER TMPS'])

            {!! Form::close() !!}
        </div>
@endsection

@section('scripts')
	<link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
	<script type="text/javascript">
		$( "#autocomplete-fryer" ).autocomplete({
			source: '/get-autocomplete-fryer-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#fryer_id').val(ui.item.id);
			}
		});
		$( "#autocomplete-move-to-fryer" ).autocomplete({
			source: '/get-autocomplete-fryer-options',
			minLength: 1,
			select: function(event, ui) {
			  	$(this).val(ui.item.value);
			  	$('#moved_to_fryer_id').val(ui.item.id);
			}
		});
		$("#creation_date").datetimepicker({
	      dateFormat:'Y-m-d H:i:s',
	    });
	    $('#is-oil-moved').click(function(){
	    	if( $(this).is(':checked') )
	    		$('#is-oil-moved-child').fadeIn();
	    	else
	    		$('#is-oil-moved-child').fadeOut();
	    });
	    window.onload = function(e) {
	    	if($('#is-oil-moved').is(':checked'))
	    		$('#is-oil-moved-child').fadeIn();
	    }
	</script>
@endsection

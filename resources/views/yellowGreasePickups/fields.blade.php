<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('yellowGreasePickups.index') !!}" class="btn btn-default pull-right">Discard</a>
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-left']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Yellow Grease Pickup Details</h3>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <input value="{!! isset($yellowGreasePickup->corporation->corporation_name) ? $yellowGreasePickup->corporation->corporation_name : '' !!}" id="autocomplete-corporation" class="form-control" placeholder="" type="text">
			<label tabindex="-1">Corporation Name</label>
            {!! Form::hidden('corporation_id', null, ['id' => 'corporation_id']) !!}
        </div>
        <div class="col-md-8 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
            <!-- Status Field -->
            {!! Form::hidden('status', false) !!}
            {!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
            <label for="is-active" class="checkbox-inline">
                is Active?
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <input value="{!! isset($yellowGreasePickup->casino->casino_trade_name) ? $yellowGreasePickup->casino->casino_trade_name : '' !!}" id="autocomplete-casino" class="form-control" placeholder="" type="text">
			<label tabindex="-1">Casino Name</label>
            {!! Form::hidden('casino_id', null, ['id' => 'casino_id']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            {!! Form::number('grease', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Grease</label>
        </div>
        <div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            {!! Form::text('pickup_date', null, ['id' => 'pickup_date', 'class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Pickup Date</label>
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>


@section('scripts')
    <link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
    <script type="text/javascript">
        $(".form-control").keyup(function( event ) {
            if ( event.which == 13 ) {
                event.preventDefault();
            }

            var autocomplete_corporation = $("#autocomplete-corporation").val();
            var autocomplete_casino = $("#autocomplete-casino").val();
            if(autocomplete_corporation == "")
                $('#corporation_id').val("");
            if(autocomplete_casino == "")
                $("#casino_id").val("");

        });

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
          format:'Y-m-d H:i:s',
        });
    </script>
@endsection
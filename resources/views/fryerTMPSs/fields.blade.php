<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('fryerTMPSs.index') !!}" class="btn btn-default pull-right">Discard</a>
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
            <h3>Fryer TPMS Details</h3>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <input value="{!! isset($fryerTMPS->fryer->fryer_name) ? $fryerTMPS->fryer->fryer_name : '' !!}" id="autocomplete-fryer" class="form-control" placeholder="Fryer Name" type="text">
            {!! Form::hidden('fryer_id', null, ['id' => 'fryer_id', 'class' => 'form-control']) !!}
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
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Measured Tpm Field -->
            {!! Form::number('measured_tpm', null, ['class' => 'form-control', 'placeholder' => 'Measured TPM', 'step'=>'any']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Oil Temp Field -->
            {!! Form::number('oil_temp', null, ['class' => 'form-control', 'placeholder' => 'Oil Temp', 'step'=>'any']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Quantity Added Field -->
            {!! Form::number('quantity_added', null, ['class' => 'form-control', 'placeholder' => 'Quantity Added']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Creation Date Field -->
            {!! Form::text('creation_date', null, ['id' => 'creation_date', 'class' => 'form-control', 'placeholder' => 'Creation Date']) !!}
        </div>
    </div>
    <div class="row">
        <!-- Changed Oil Field -->
        <div class="col-md-3 col-md-offset-1 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
            {!! Form::hidden('changed_oil', false) !!}
            {!! Form::checkbox('changed_oil', '1', null, ['id' => 'is-changed-oil', 'class' => 'styled']) !!}
            <label for="is-changed-oil" class="checkbox-inline">
                Oil Changed?
            </label>
        </div>
    </div>
    <div class="row">
        <!-- Oil Moved Field -->
        <div class="col-md-3 col-md-offset-1 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
            {!! Form::hidden('oil_moved', false) !!}
            {!! Form::checkbox('oil_moved', '1', null, ['id' => 'is-oil-moved', 'class' => 'styled']) !!}
            <label for="is-oil-moved" class="checkbox-inline">
                Oil Moved?
            </label>
        </div>
    </div>
    <div id="is-oil-moved-child" class="row" style="display:none;">
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Amount Moved Field -->
            {!! Form::number('amount_moved', null, ['class' => 'form-control', 'placeholder' => 'Amount Moved', 'step'=>'any']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Moved To Fryer Id Field -->
            <input value="{!! isset($fryerTMPS->moveToFryer->fryer_name) ? $fryerTMPS->moveToFryer->fryer_name : '' !!}" id="autocomplete-move-to-fryer" class="form-control" placeholder="Moved to Fryer" type="text">
            {!! Form::hidden('moved_to_fryer_id', null, ['id' => 'moved_to_fryer_id', 'class' => 'form-control']) !!}
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

            var autocomplete_fryer = $("#autocomplete-fryer").val();
            var autocomplete_move_to_fryer = $("#autocomplete-move-to-fryer").val();
            if(autocomplete_fryer == "")
                $('#fryer_id').val("");
            if(autocomplete_move_to_fryer == "")
                $("#moved_to_fryer_id").val("");

        });

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
          format:'Y-m-d H:i:s',
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







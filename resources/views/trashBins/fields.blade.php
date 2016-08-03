<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('trashBins.index') !!}" class="btn btn-default pull-right">Discard</a>
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
            <h3>Trash Bins Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6">
                    <a href="#" class="pull-right">Show</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Restaurant Id Field -->
            <input value="{!! isset($trashBin->restaurant->restaurant_name) ? $trashBin->restaurant->restaurant_name : '' !!}" id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id', 'class' => 'form-control']) !!}
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
            <!-- Log Option Id Field -->
            {!! Form::select('log_option_id', $logoptions, null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Trash Weight Field -->
            {!! Form::number('trash_weight', null, ['class' => 'form-control', 'placeholder' => 'Trash Weight']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Creation Date Field -->
            <input id="creation_date" class="form-control" placeholder="Creation Date" name="creation_date" type="text" value="{!! isset($trashBin->creation_date) ? $trashBin->creation_date : '' !!}">
        </div>
    </div>
</div>

@section('scripts')
    <link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
    
    <script type="text/javascript">
        $( "#autocomplete-restaurant" ).autocomplete({
            source: '/get-autocomplete-restaurants-options',
            minLength: 1,
            select: function(event, ui) {
                $(this).val(ui.item.value);
                $('#restaurant_id').val(ui.item.id);
            }
        });
        $("#creation_date").datetimepicker({
          format:'Y-m-d H:i:s',
        });
    </script>
@endsection



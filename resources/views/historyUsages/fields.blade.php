<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('historyUsages.index') !!}" class="btn btn-default pull-right">Discard</a>
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
            <h3>History Usage Details</h3>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <input value="{!! isset($historyUsage->corporation->corporation_name) ? $historyUsage->corporation->corporation_name : '' !!}" id="autocomplete-corporation" class="form-control" placeholder="Corporation Name" type="text">
            {!! Form::hidden('corporation_id', null, ['id' => 'corporation_id', 'class' => 'form-control']) !!}
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
        <div class="col-md-4 row-spacer-top-bot">
            <input value="{!! isset($historyUsage->casino->casino_trade_name) ? $historyUsage->casino->casino_trade_name : '' !!}" id="autocomplete-casino" class="form-control" placeholder="Casino Name" type="text">
            {!! Form::hidden('casino_id', null, ['id' => 'casino_id', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <input value="{!! isset($historyUsage->restaurant->restaurant_name) ? $historyUsage->restaurant->restaurant_name : '' !!}" id="autocomplete-restaurant" class="form-control" placeholder="Restaurant Name" type="text">
            {!! Form::hidden('restaurant_id', null, ['id' => 'restaurant_id', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            {!! Form::number('usage', null, ['class' => 'form-control', 'placeholder' => 'Usage']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            {!! Form::select('month', array('' => 'Select Month', 'January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

@section('scripts')
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
        $( "#autocomplete-restaurant" ).autocomplete({
            source: '/get-autocomplete-restaurants-options',
            minLength: 1,
            select: function(event, ui) {
                $(this).val(ui.item.value);
                $('#restaurant_id').val(ui.item.id);
            }
        });
    </script>
@endsection
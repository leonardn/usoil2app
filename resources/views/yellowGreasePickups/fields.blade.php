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
            <input id="autocomplete-corporation" class="form-control" placeholder="Corporation Name" type="text">
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
        <div class="col-md-4 row-spacer-top-bot">
            <input id="autocomplete-casino" class="form-control" placeholder="Casino Name" type="text">
            {!! Form::hidden('casino_id', null, ['id' => 'casino_id']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 row-spacer-top-bot">
            {!! Form::number('grease', null, ['class' => 'form-control', 'placeholder' => 'Grease']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            {!! Form::date('pickup_date', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>
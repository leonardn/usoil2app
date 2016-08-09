<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('logrequests.index') !!}" class="btn btn-default pull-right">Discard</a>
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
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
		<div class="col-md-4 row-spacer-top-bot">
            <!-- Fryer Name Field -->
            <input id="autocomplete-fryer" class="form-control" placeholder="Fryer Name" type="text">
            {!! Form::hidden('fryer_id', null, ['id' => 'fryer_id']) !!}
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
            <!-- Log Option Title Field -->
            <input id="autocomplete-logoption" class="form-control" placeholder="Log Option" type="text">
            {!! Form::hidden('log_option_id', null, ['id' => 'log_option_id']) !!}
        </div>
        <div class="col-md-3 row-spacer-top-bot">
            <!-- Creation Date/Time Field -->
			{!! Form::text('creation_date', null, ['id'=>'creation_date', 'class' => 'form-control', 'placeholder' => 'Creation Date/Time']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('fryers.index') !!}" class="btn btn-default pull-right">Discard</a>
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
            <h3>Fryers Details</h3>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            {!! Form::text('fryer_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Fryer Name</label>
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
            <!-- Make Field -->
            {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Make</label>
        </div>
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Model Field -->
            {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Model</label>
        </div>
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Serial Number Field -->
            {!! Form::text('serial_number', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Serial Number</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Oil Capacity Field -->
            {!! Form::number('oil_capacity', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Oil Capacity</label>
        </div>
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Benchmark Field -->
            {!! Form::number('benchmark', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Benchmark</label>
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

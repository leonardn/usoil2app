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
            {!! Form::text('fryer_name', null, ['class' => 'form-control', 'placeholder' => 'Fryer Name']) !!}
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
            <!-- Make Field -->
            {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'Make']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Model Field -->
            {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Model']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Serial Number Field -->
            {!! Form::text('serial_number', null, ['class' => 'form-control', 'placeholder' => 'Serial Number']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Oil Capacity Field -->
            {!! Form::number('oil_capacity', null, ['class' => 'form-control', 'placeholder' => 'Oil Capacity']) !!}
        </div>
        <div class="col-md-4 row-spacer-top-bot">
            <!-- Benchmark Field -->
            {!! Form::number('benchmark', null, ['class' => 'form-control', 'placeholder' => 'Benchmark']) !!}
        </div>
    </div>
    <div class="col-md-12 line-break"></div>
</div>

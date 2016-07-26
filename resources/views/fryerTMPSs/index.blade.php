@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <h4>TMPS SEARCH</h4>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="row ">
        <div class="col-md-10 row-spacer-top-bot">
            <h3>TMPS Search</h3>
        </div>
        <div class="col-md-2 row-spacer-top-bot">
            <div class="row top-right-btn">
                <div class="col-md-12">
                    <a href="/fryerTMPSs" class="btn btn-default pull-right">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row">
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::text('fryer_id', null, ['class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::number('measured_tpm', null, ['class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::number('oil_temp', null, ['class' => 'form-control']) !!}
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
		    <label class="checkbox-inline">
		        {!! Form::hidden('changed_oil', false) !!}
		        {!! Form::checkbox('changed_oil', '1', null) !!} Oil Changed?
		    </label>
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
		    <label class="checkbox-inline">
		        {!! Form::hidden('oil_moved', false) !!}
		        {!! Form::checkbox('oil_moved', '1', null) !!} Oil Moved?
		    </label>
     	</div>
     	<div class="col-md-2 row-spacer-top-bot">
     		{!! Form::date('creation_date', null, ['class' => 'form-control']) !!}
     	</div>
     </div>
    <div class="col-md-12 line-break"></div>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-3 btn-spacer-top-bot">
			<a href="{!! url('#') !!}" class="btn btn-primary">
                <i class="fa fa-file-excel-o fa-2 pull-left" aria-hidden="true"></i>
                Export
            </a>
			<a href="{!! route('fryerTMPSs.create') !!}" class="btn btn-primary pull-right">
                <i class="fa fa-plus-circle fa-2 pull-left" aria-hidden="true"></i>
                Add New
            </a>
		</div>
	</div>
</div>

<div id="get-fryerTMPSs">
	@include('fryerTMPSs.table')
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content text-center">
            <div class="modal-header">
                <strong>Are you sure you want to delete this record?</strong>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary" data-dismiss="modal">&nbsp; &nbsp; &nbsp; No &nbsp; &nbsp; &nbsp;</button>
                <a href="#" id="submit" class="btn btn-default" id-to-delete="0">&nbsp; &nbsp; &nbsp; Yes &nbsp; &nbsp; &nbsp;</a>
            </div>
        </div>
    </div>
</div>

@endsection

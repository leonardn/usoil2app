<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $logrequests->id !!}</p>
</div>

<!-- Fryer Name Field -->
<div class="form-group">
    {!! Form::label('fryer_id', 'Fryer Name:') !!}
    <p>{!! $logrequests->fryer_name !!}</p>
</div>

<!-- Log Option Field -->
<div class="form-group">
    {!! Form::label('log_option_id', 'Log Option:') !!}
    <p>{!! $logrequests->option_title !!}</p>
</div>

<!-- Creation Date/Time Field -->
<div class="form-group">
    {!! Form::label('creation_date', 'Creation Date/Time:') !!}
    <p>{!! $logrequests->creation_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $logrequests->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $logrequests->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $logrequests->updated_at !!}</p>
</div>


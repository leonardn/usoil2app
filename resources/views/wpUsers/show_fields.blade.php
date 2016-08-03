<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $wpUsers->id !!}</p>
</div>

<!-- Wp User Id Field -->
<div class="form-group">
    {!! Form::label('wp_user_id', 'Wp User Id:') !!}
    <p>{!! $wpUsers->wp_user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $wpUsers->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $wpUsers->updated_at !!}</p>
</div>


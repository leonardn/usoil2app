<table class="table table-responsive" id="fryerTMPSs-table">
    <thead>
        <th>Fryer Id</th>
        <th>Measured Tpm</th>
        <th>Oil Temp</th>
        <th>Changed Oil</th>
        <th>Quantity Added</th>
        <th>Oil Moved</th>
        <th>Amount Moved</th>
        <th>Moved To Fryer Id</th>
        <th>Creation Date</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($fryerTMPSs as $fryerTMPS)
        <tr>
            <td>{!! $fryerTMPS->fryer_id !!}</td>
            <td>{!! $fryerTMPS->measured_tpm !!}</td>
            <td>{!! $fryerTMPS->oil_temp !!}</td>
            <td>{!! $fryerTMPS->changed_oil !!}</td>
            <td>{!! $fryerTMPS->quantity_added !!}</td>
            <td>{!! $fryerTMPS->oil_moved !!}</td>
            <td>{!! $fryerTMPS->amount_moved !!}</td>
            <td>{!! $fryerTMPS->moved_to_fryer_id !!}</td>
            <td>{!! $fryerTMPS->creation_date !!}</td>
            <td>{!! $fryerTMPS->status !!}</td>
            <td>
                {!! Form::open(['route' => ['fryerTMPSs.destroy', $fryerTMPS->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fryerTMPSs.show', [$fryerTMPS->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fryerTMPSs.edit', [$fryerTMPS->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

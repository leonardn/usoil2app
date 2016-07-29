<table class="table table-responsive" id="trashBins-table">
    <thead>
        <th>Restaurant Id</th>
        <th>Log Option Id</th>
        <th>Trash Weight</th>
        <th>Creation Date</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($trashBins as $trashBin)
        <tr>
            <td>{!! $trashBin->restaurant_id !!}</td>
            <td>{!! $trashBin->log_option_id !!}</td>
            <td>{!! $trashBin->trash_weight !!}</td>
            <td>{!! $trashBin->creation_date !!}</td>
            <td>{!! $trashBin->status !!}</td>
            <td>
                {!! Form::open(['route' => ['trashBins.destroy', $trashBin->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trashBins.show', [$trashBin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trashBins.edit', [$trashBin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

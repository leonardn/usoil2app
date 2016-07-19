<table class="table table-responsive" id="machines-table">
    <thead>
        <th>Machine Name</th>
        <th>Machine Type</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($machines as $machine)
        <tr>
            <td>{!! $machine->machine_name !!}</td>
            <td>{!! $machine->machine_type !!}</td>
            <td>
                {!! Form::open(['route' => ['machines.destroy', $machine->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('machines.show', [$machine->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('machines.edit', [$machine->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

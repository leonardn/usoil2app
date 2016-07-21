<table class="table table-responsive" id="machinereadings-table">
    <thead>
        <th>Restaurant Name</th>
        <th>Machine Name</th>
        <th>Temperature Reading</th>
        <th>Reading Date/Time</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($machinereadings as $machinereading)
        <tr>
            <td>{!! $machinereading->restaurant_name !!}</td>
            <td>{!! $machinereading->machine_name !!}</td>
            <td>{!! $machinereading->temperature_reading !!}</td>
            <td>{!! $machinereading->reading_date_time !!}</td>
            <td>
                {!! Form::open(['route' => ['machinereadings.destroy', $machinereading->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('machinereadings.show', [$machinereading->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('machinereadings.edit', [$machinereading->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

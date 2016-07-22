<table class="table table-responsive" id="yellowGreasePickups-table">
    <thead>
        <th>Corporation Id</th>
        <th>Casino Id</th>
        <th>Grease</th>
        <th>Pickup Date</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($yellowGreasePickups as $yellowGreasePickup)
        <tr>
            <td>{!! $yellowGreasePickup->corporation_id !!}</td>
            <td>{!! $yellowGreasePickup->casino_id !!}</td>
            <td>{!! $yellowGreasePickup->grease !!}</td>
            <td>{!! $yellowGreasePickup->pickup_date !!}</td>
            <td>{!! $yellowGreasePickup->status !!}</td>
            <td>
                {!! Form::open(['route' => ['yellowGreasePickups.destroy', $yellowGreasePickup->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('yellowGreasePickups.show', [$yellowGreasePickup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('yellowGreasePickups.edit', [$yellowGreasePickup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

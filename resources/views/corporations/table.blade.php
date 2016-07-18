<table class="table table-responsive" id="corporations-table">
    <thead>
        <th>Corporation Name</th>
        <th>Corporation Address1</th>
        <th>Corporation Address2</th>
        <th>Corporation City</th>
        <th>Corporation State</th>
        <th>Corporation Zipcode</th>
        <th>Corporation Phone</th>
        <th>Corporation Phone Ext</th>
        <th>Contact Person Title</th>
        <th>Contact Person First Name</th>
        <th>Contact Person Last Name</th>
        <th>Contact Person Email</th>
        <th>Contact Person Phone</th>
        <th>Contact Person Phone Ext</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($corporations as $corporation)
        <tr>
            <td>{!! $corporation->corporation_name !!}</td>
            <td>{!! $corporation->corporation_address1 !!}</td>
            <td>{!! $corporation->corporation_address2 !!}</td>
            <td>{!! $corporation->corporation_city !!}</td>
            <td>{!! $corporation->corporation_state !!}</td>
            <td>{!! $corporation->corporation_zipcode !!}</td>
            <td>{!! $corporation->corporation_phone !!}</td>
            <td>{!! $corporation->corporation_phone_ext !!}</td>
            <td>{!! $corporation->contact_person_title !!}</td>
            <td>{!! $corporation->contact_person_first_name !!}</td>
            <td>{!! $corporation->contact_person_last_name !!}</td>
            <td>{!! $corporation->contact_person_email !!}</td>
            <td>{!! $corporation->contact_person_phone !!}</td>
            <td>{!! $corporation->contact_person_phone_ext !!}</td>
            <td>{!! $corporation->status !!}</td>
            <td>
                {!! Form::open(['route' => ['corporations.destroy', $corporation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('corporations.show', [$corporation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('corporations.edit', [$corporation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

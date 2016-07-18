<table class="table table-responsive" id="casinos-table">
    <thead>
        <th>Casino Trade Name</th>
        <th>Casino Email</th>
        <th>Casino Address1</th>
        <th>Casino Address2</th>
        <th>Casino City</th>
        <th>Casino State</th>
        <th>Casino Zipcode</th>
        <th>Casino Phone</th>
        <th>Casino Phone Ext</th>
        <th>Casino Ein</th>
        <th>Account Payable Name</th>
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
    @foreach($casinos as $casino)
        <tr>
            <td>{!! $casino->casino_trade_name !!}</td>
            <td>{!! $casino->casino_email !!}</td>
            <td>{!! $casino->casino_address1 !!}</td>
            <td>{!! $casino->casino_address2 !!}</td>
            <td>{!! $casino->casino_city !!}</td>
            <td>{!! $casino->casino_state !!}</td>
            <td>{!! $casino->casino_zipcode !!}</td>
            <td>{!! $casino->casino_phone !!}</td>
            <td>{!! $casino->casino_phone_ext !!}</td>
            <td>{!! $casino->casino_ein !!}</td>
            <td>{!! $casino->account_payable_name !!}</td>
            <td>{!! $casino->contact_person_title !!}</td>
            <td>{!! $casino->contact_person_first_name !!}</td>
            <td>{!! $casino->contact_person_last_name !!}</td>
            <td>{!! $casino->contact_person_email !!}</td>
            <td>{!! $casino->contact_person_phone !!}</td>
            <td>{!! $casino->contact_person_phone_ext !!}</td>
            <td>{!! $casino->status !!}</td>
            <td>
                {!! Form::open(['route' => ['casinos.destroy', $casino->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('casinos.show', [$casino->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('casinos.edit', [$casino->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

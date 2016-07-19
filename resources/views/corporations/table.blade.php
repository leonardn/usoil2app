<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive" id="corporations-table">
                <thead>
                    <th>Corporation Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                @foreach($corporations as $corporation)
                    <tr>
                        <td>{!! $corporation->corporation_name !!}</td>
                        <td>{!! $corporation->corporation_address1 !!}</td>
                        <td>{!! $corporation->corporation_city !!}</td>
                        <td>{!! $corporation->contact_person_first_name." ".$corporation->contact_person_last_name !!}</td>
                        <td>{!! $corporation->corporation_phone !!}</td>
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
            @include('core-templates::common.paginate', ['records' => $corporations])
        </div>
    </div>
</div>

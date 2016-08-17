<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="casinos-table">
                <thead>
                    <th>Casino Trade Name</th>
                    <th>Casino Address1</th>
                    <th>Casino City</th>
                    <th>Contact Person </th>
                    <th>Casino Phone</th>
                    <th>Casino Ein</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($casinos as $casino)
                    <tr>
                        <td>{!! $casino->casino_trade_name !!}</td>
                        <td>{!! $casino->casino_address1 !!}</td>
                        <td>{!! $casino->casino_city !!}</td>
                        <td>{!! $casino->contact_person_first_name.' '.$casino->contact_person_last_name !!}</td>
                        <td>{!! $casino->casino_phone !!}</td>
                        <td>{!! $casino->casino_ein !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['casinos.destroy', $casino->id], 'method' => 'delete', 'id' => 'form-delete-'.$casino->id]) !!}
                            <a href="{!! route('casinos.edit', [$casino->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a> 
                            <div class='btn-group'>
                                <!-- <a href="{!! route('casinos.show', [$casino->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $casino->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $casinos])
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="fryers-table">
                <thead>
                    <th>Fryer Name</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Oil Capacity</th>
                    <th>Benchmark</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($fryers as $fryer)
                    <tr>
                        <td>{!! $fryer->fryer_name !!}</td>
                        <td>{!! $fryer->make !!}</td>
                        <td>{!! $fryer->model !!}</td>
                        <td>{!! $fryer->serial_number !!}</td>
                        <td>{!! $fryer->oil_capacity !!}</td>
                        <td>{!! $fryer->benchmark !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['fryers.destroy', $fryer->id], 'method' => 'delete', 'id' => 'form-delete-'.$fryer->id]) !!}
                            <a href="{!! route('fryers.edit', [$fryer->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                <!-- <a href="{!! route('fryers.show', [$fryer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $fryer->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $fryers])
        </div>
    </div>
</div>

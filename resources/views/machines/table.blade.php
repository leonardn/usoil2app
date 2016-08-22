<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="casinos-table">
                <thead>
					<th>Machine Name</th>
					<th>Machine Type</th>
					<th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($machines as $machine)
                    <tr>
						<td>{!! $machine->machine_name !!}</td>
                        <td>{!! $machine->machine_type !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['machines.destroy', $machine->id], 'method' => 'delete', 'id' => 'form-delete-'.$machine->id]) !!}
                            <a href="{!! route('machines.edit', [$machine->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a> 
                            <div class='btn-group'>
                                <!-- <a href="{!! route('machines.show', [$machine->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $machine->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $machines])
        </div>
    </div>
</div>

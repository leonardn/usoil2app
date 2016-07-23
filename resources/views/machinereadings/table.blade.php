<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="casinos-table">
                <thead>
                    <th>Restaurant Name</th>
					<th>Machine Name</th>
					<th>Temperature Reading</th>
					<th>Reading Date/Time</th>
					<th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($machinereadings as $machinereading)
                    <tr>
                        <td>{!! $machinereading->restaurant_name !!}</td>
						<td>{!! $machinereading->machine_name !!}</td>
						<td>{!! $machinereading->temperature_reading !!}</td>
						<td>{!! $machinereading->reading_date_time !!}</td>
                        <td class="text-center border-right">
							{!! Form::open(['route' => ['machinereadings.destroy', $machinereading->id], 'method' => 'delete', 'id' => 'form-delete-'.$machinereading->id]) !!}
							<a href="{!! route('machinereadings.edit', [$machinereading->id]) !!}" class='btn btn-default btn-xs'>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								Edit
							</a> 
							<div class='btn-group'>
								<!-- <a href="{!! route('machinereadings.show', [$machinereading->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
								{!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $machinereading->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
							</div>
							{!! Form::close() !!}
						</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $machinereadings])
        </div>
    </div>
</div>

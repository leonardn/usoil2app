<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="casinos-table">
                <thead>
                    <th>Fryer Name</th>
					<th>Log Option</th>
					<th>Creation Date/Time</th>
					<th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($logrequests as $logrequest)
                    <tr>
                        <td>{!! $logrequest->fryers->fryer_name !!}</td>
						<td>{!! $logrequest->logoptions->option_title !!}</td>
						<td>{!! $logrequest->creation_date !!}</td>
                        <td class="text-center border-right">
							{!! Form::open(['route' => ['logrequests.destroy', $logrequest->id], 'method' => 'delete', 'id' => 'form-delete-'.$logrequest->id]) !!}
							<a href="{!! route('logrequests.edit', [$logrequest->id]) !!}" class='btn btn-default btn-xs'>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								Edit
							</a> 
							<div class='btn-group'>
								<!-- <a href="{!! route('logrequests.show', [$logrequest->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
								{!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $logrequest->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
							</div>
							{!! Form::close() !!}
						</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $logrequests])
        </div>
    </div>
</div>

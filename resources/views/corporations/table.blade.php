<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="corporations-table">
                <thead>
                    <th>Corporation Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($corporations as $corporation)
                    <tr>
                        <td>{!! $corporation->corporation_name !!}</td>
                        <td>{!! $corporation->corporation_address1 !!}</td>
                        <td>{!! $corporation->corporation_city !!}</td>
                        <td>{!! $corporation->contact_person_first_name." ".$corporation->contact_person_last_name !!}</td>
                        <td>{!! $corporation->corporation_phone !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['corporations.destroy', $corporation->id], 'method' => 'delete', 'id' => 'form-delete-'.$corporation->id]) !!}
                            <a href="{!! route('corporations.edit', [$corporation->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                <!-- <a href="{!! route('corporations.show', [$corporation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->

                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'value' => 'Delete', 'id-to-delete' => $corporation->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
	    </div>
		<div class="col-md-12">
			 <div class="col-md-2 row-spacer-top-bot">
				<label>Records Per Page</label>
				{!! Form::select('pagesize', Config::get('constants.pagesize'), $pagesize, ['class' => 'form-control', 'id' => 'pagesize']) !!}
			</div>
			<strong>Total Records Found:</strong> {!! $corporations->total() !!}
			@include('core-templates::common.paginate', ['records' => $corporations])
		</div>
    </div>
</div>

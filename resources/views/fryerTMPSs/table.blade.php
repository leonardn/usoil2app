 <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="fryerTMPSs-table">
                <thead>
                    <th>Fryer Name</th>
                    <th>Measured Tpm</th>
                    <th>Oil Temp</th>
                    <th>Changed Oil</th>
                    <th>Quantity Added</th>
                    <th>Oil Moved</th>
                    <th>Moved To Fryer Id</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                @foreach($fryerTMPSs as $fryerTMPS)
                    <tr>
                        <td>{!! $fryerTMPS->fryer->fryer_name !!}</td>
                        <td>{!! $fryerTMPS->measured_tpm !!}</td>
                        <td>{!! $fryerTMPS->oil_temp !!}</td>
                        <td>{!! $fryerTMPS->changed_oil !!}</td>
                        <td>{!! $fryerTMPS->quantity_added !!}</td>
                        <td>{!! $fryerTMPS->oil_moved !!}</td>
                        <td>{!! isset($fryerTMPS->moveToFryer->fryer_name) ? $fryerTMPS->moveToFryer->fryer_name : '' !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['fryerTMPSs.destroy', $fryerTMPS->id], 'method' => 'delete', 'id' => 'form-delete-'.$fryerTMPS->id]) !!}
                            <a href="{!! route('fryerTMPSs.edit', [$fryerTMPS->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $fryerTMPS->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $fryerTMPSs])
        </div>
    </div>
</div>

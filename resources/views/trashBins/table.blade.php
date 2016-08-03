 <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="trashBins-table">
                <thead>
                    <th>Restaurant Name</th>
                    <th>Log Option</th>
                    <th>Trash Weight</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                @foreach($trashBins as $trashBin)
                    <tr>
                        <td>{!! $trashBin->restaurant->restaurant_name !!}</td>
                        <td>{!! $trashBin->logoption->option_title !!}</td>
                        <td>{!! $trashBin->trash_weight !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['trashBins.destroy', $trashBin->id], 'method' => 'delete', 'id' => 'form-delete-'.$trashBin->id]) !!}
                            <a href="{!! route('trashBins.edit', [$trashBin->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $trashBin->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $trashBins])
        </div>
    </div>
</div>

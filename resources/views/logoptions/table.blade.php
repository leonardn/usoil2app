<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="logoptions-table">
                <thead>
                    <th>Option Title</th>
					<th>Option Type</th>
					<th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($logoptions as $logoption)
                    <tr>
                        <td>{!! $logoption->option_title !!}</td>
                        <td>{!! $logoption->option_type !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['logoptions.destroy', $logoption->id], 'method' => 'delete', 'id' => 'form-delete-'.$logoption->id]) !!}
                            <a href="{!! route('logoptions.edit', [$logoption->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a> 
                            <div class='btn-group'>
                                <!-- <a href="{!! route('logoptions.show', [$logoption->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $logoption->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $logoptions])
        </div>
    </div>
</div>

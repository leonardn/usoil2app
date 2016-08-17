 <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="historyUsages-table">
                <thead>
                    <th>Corporation Name</th>
                    <th>Casino Name</th>
                    <th>Restaurant Name</th>
                    <th>Usage</th>
                    <th>Month</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                @foreach($historyUsages as $historyUsage)
                    <tr>
                        <td>{!! $historyUsage->corporation->corporation_name !!}</td>
                        <td>{!! $historyUsage->casino->casino_trade_name !!}</td>
                        <td>{!! $historyUsage->restaurant->restaurant_name !!}</td>
                        <td>{!! $historyUsage->usage !!}</td>
                        <td>{!! $historyUsage->month !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['historyUsages.destroy', $historyUsage->id], 'method' => 'delete', 'id' => 'form-delete-'.$historyUsage->id]) !!}
                            <a href="{!! route('historyUsages.edit', [$historyUsage->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $historyUsage->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $historyUsages])
        </div>
    </div>
</div>

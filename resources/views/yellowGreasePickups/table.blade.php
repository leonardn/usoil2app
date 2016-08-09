<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="yellowGreasePickups-table">
                <thead>
                    <th>Corporation Name</th>
                    <th>Casino Name</th>
                    <th>Grease</th>
                    <th>Pickup Date</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($yellowGreasePickups as $yellowGreasePickup)
                    <tr>
                        <td>{!! $yellowGreasePickup->corporation->corporation_name !!}</td>
                        <td>{!! $yellowGreasePickup->casino->casino_trade_name !!}</td>
                        <td>{!! $yellowGreasePickup->grease !!}</td>
                        <td>{!! $yellowGreasePickup->pickup_date !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['yellowGreasePickups.destroy', $yellowGreasePickup->id], 'method' => 'delete', 'id' => 'form-delete-'.$yellowGreasePickup->id]) !!}
                            <a href="{!! route('yellowGreasePickups.edit', [$yellowGreasePickup->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $yellowGreasePickup->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $yellowGreasePickups])
        </div>
    </div>
</div>

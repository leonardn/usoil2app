<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="restaurants-table">
                <thead>
                    <th>Restaurant Name</th>
                    <th>Location</th>
                    <th>Location Code</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Activation Date</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{!! $restaurant->restaurant_name !!}</td>
                        <td>{!! $restaurant->restaurant_location !!}</td>
                        <td>{!! $restaurant->restaurant_location_code !!}</td>
                        <td>{!! $restaurant->contact_person_first_name.' '.$restaurant->contact_person_last_name !!}</td>
                        <td>{!! $restaurant->contact_person_phone !!}</td>
                        <td>{!! $restaurant->activation_date !!}</td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete','id' => 'form-delete-'.$restaurant->id]) !!}
                            <a href="{!! route('restaurants.edit', [$restaurant->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                <!-- <a href="{!! route('restaurants.show', [$restaurant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $restaurant->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $restaurants])
        </div>
    </div>

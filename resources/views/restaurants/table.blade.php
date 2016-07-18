<table class="table table-responsive" id="restaurants-table">
    <thead>
        <th>Restaurant Name</th>
        <th>Restaurant Location Code</th>
        <th>Restaurant Location</th>
        <th>Restaurant Location Lati</th>
        <th>Restaurant Location Long</th>
        <th>Contact Person Title</th>
        <th>Contact Person First Name</th>
        <th>Contact Person Last Name</th>
        <th>Contact Person Email</th>
        <th>Contact Person Phone</th>
        <th>Contact Person Phone Ext</th>
        <th>Activation Date</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($restaurants as $restaurant)
        <tr>
            <td>{!! $restaurant->restaurant_name !!}</td>
            <td>{!! $restaurant->restaurant_location_code !!}</td>
            <td>{!! $restaurant->restaurant_location !!}</td>
            <td>{!! $restaurant->restaurant_location_lati !!}</td>
            <td>{!! $restaurant->restaurant_location_long !!}</td>
            <td>{!! $restaurant->contact_person_title !!}</td>
            <td>{!! $restaurant->contact_person_first_name !!}</td>
            <td>{!! $restaurant->contact_person_last_name !!}</td>
            <td>{!! $restaurant->contact_person_email !!}</td>
            <td>{!! $restaurant->contact_person_phone !!}</td>
            <td>{!! $restaurant->contact_person_phone_ext !!}</td>
            <td>{!! $restaurant->activation_date !!}</td>
            <td>{!! $restaurant->status !!}</td>
            <td>
                {!! Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('restaurants.show', [$restaurant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('restaurants.edit', [$restaurant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
